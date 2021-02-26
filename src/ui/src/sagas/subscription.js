import uuidv1 from 'uuid/v1';
import { LOCATION_CHANGE, push } from 'connected-react-router';
import moment from 'moment';

import {
  GET_SELECTIONS,
  loadSelections,
  setSelectionLoading,
  SAVE_LEAD,
  setStandardizedAddress,
  STANDARDIZE_ADDRESS,
  setNeedAditionalData,
  GET_ACCEPTED_PAYMENT_METHODS,
  setAcceptedPaymentMethods,
  SEND_SUBSCRIPTION,
  clearSubscriptionForm,
  VALIDATE_CLN_CARD_NUMBER,
  setIsValidCLNCardNumber,
  SAVE_LEAD_STEP,
  setFromSelection,
  BACK_FROM_REGISTRATION,
  GO_TO_REGISTRATION,
  unsetFromSelection
} from '../actions/subscription';
import {
  SUBSCRIPTION,
  REGISTRATION_DEFAULT,
  REGISTRATION,
  SELECTION
} from '../routes';
import { options } from '../components/RegistrationStepThree/options';
import { CONSTANTS } from '../config/constants';
import { CancelToken, bonvivirApi } from '../services';

import {
  all,
  call,
  cancel,
  put,
  putResolve,
  take,
  takeLatest
} from 'redux-saga/effects';

const cancelConfig = { cancelToken: null };

function* getSelections() {
  try {
    const { ok, data } = yield call(bonvivirApi.getSelections);

    yield put(setSelectionLoading(true));

    if (!ok || !Array.isArray(data)) {
      return;
    }

    yield putResolve(loadSelections(data));
    yield put(setSelectionLoading(false));
  } catch (err) {
    throw err;
  }
}

function* saveLead({ formData, campaignId }) {
  try {
    const phone = formData.cod + formData.tel;
    const data = {
      firstName: formData.name,
      lastName: formData.lastName,
      email: formData.email,
      phone,
      gender: formData.gender,
      mobile: phone,
      campaign: campaignId,
      subject: CONSTANTS.SUBJECT_REQUEST
    };

    yield call(bonvivirApi.postLead, data);
  } catch (err) {
    throw err;
  }
}

function* saveLeadStep({ formData, campaignId }) {
  try {
    const phone = formData.cod + formData.tel;
    const data = {
      firstName: formData.name,
      lastName: formData.lastName,
      email: formData.email,
      gender: formData.gender,
      phone,
      mobile: phone,
      campaign: campaignId,
      subject: CONSTANTS.SUBJECT_REQUEST
    };

    yield call(bonvivirApi.saveLeadStep, data);
  } catch (err) {
    throw err;
  }
}

function* validateCLNCardNumber({ isValidCardNumber, formData }) {
  try {
    yield putResolve(setIsValidCLNCardNumber(isValidCardNumber, formData));
  } catch (err) {
    throw err;
  }
}

function* goToRegistration(data) {
  try {
    yield putResolve(setFromSelection());
    data.referId
      ? yield putResolve(push(`${REGISTRATION_DEFAULT}/${data.referId}`))
      : yield putResolve(push(REGISTRATION_DEFAULT));
  } catch (err) {
    throw err;
  }
}

function* backFromRegistration() {
  try {
    yield putResolve(unsetFromSelection());
    yield putResolve(push(SELECTION));
  } catch (err) {
    throw err;
  }
}

function* standardizeAddress({ formData }) {
  try {
    const { ok, data } = yield call(bonvivirApi.postAddressToStandardize, {
      street: formData.street,
      doorNumber: formData.streetNumber,
      zipCode: formData.zipCode
    });

    if (!ok || !data) {
      yield putResolve(setNeedAditionalData(formData));
    } else {
      const option = options.filter(o => o.description === data.state);
      const standardizedAddress = {
        street: data.street,
        streetNumber: data.doorNumber,
        zipCode: data.zipCode,
        floorApartment: formData.floorApartment,
        apartment: formData.apartment,
        additionalData: formData.additionalData,
        neighborhood: data.district,
        zone: data.zone,
        state: option[0].value,
        renderId: uuidv1() // This attribute is use to make the form render again if there are no changes in the normalized address
      };

      yield putResolve(setStandardizedAddress(standardizedAddress));
    }
  } catch (err) {
    throw err;
  }
}

function* getAcceptedPaymentMethods({ promotionId }) {
  try {
    const { ok, data } = yield call(
      bonvivirApi.getAcceptedPaymentMethods,
      promotionId
    );

    if (!ok || !Array.isArray(data)) {
      yield putResolve(setAcceptedPaymentMethods([]));
    } else {
      yield putResolve(setAcceptedPaymentMethods(data));
    }
  } catch (err) {
    throw err;
  }
}

function* sendSubscription({ subscription }) {
  try {
    const businessUnit = '38db0e09-3db9-e111-ab17-00155d066504';
    const dni = 'D.N.I.';
    const cuit = 'C.U.I.T.';
    const consumidorFinal = 'Consumidor Final';
    const responsableInscripto = 'Responsable Inscripto';
    const usuario = JSON.parse(localStorage.getItem('contact'));

    const currentDate = new Date();
    const date = `${currentDate
      .getDate()
      .toString()
      .padStart(2, 0)}/${currentDate
      .getMonth()
      .toString()
      .padStart(2, 0)}/${currentDate
      .getFullYear()
      .toString()
      .padStart(4, 0)}`;

    if (subscription.cuit != '') {
      const cuilFin = subscription.cuit.substr(-1);
      const cuilInicio = subscription.cuit.substr(0, 2);
      const cuilCalc = subscription.cuit.length - 3;
      const cuilMedio = subscription.cuit.substr(2, cuilCalc);

      subscription.cuit = `${cuilInicio}-${cuilMedio}-${cuilFin}`;
    }

    const option = options.filter(o => o.value === subscription.state);
    const selection =
      subscription.selection.selectionDetails[
        subscription.selectionDetailSelected
      ];

    const idType = subscription.dni ? dni : cuit;
    let cliente = {};

    if (usuario) {
      cliente = {
        email: usuario.email,
        firstName: usuario.firstName,
        gender: usuario.gender,
        idNumber: usuario.idNumber,
        idType: usuario.idType,
        lastName: usuario.lastName
      }

    } else {
      cliente = {
        firstName: subscription.name,
        lastName: subscription.lastName,
        gender: subscription.gender,
        idNumber: subscription.dni || subscription.cuit,
        birthDate: subscription.date.date,
        email: subscription.email,
        taxType:
          subscription.proofOfPayment === '0'
            ? consumidorFinal
            : responsableInscripto,
        areaCode: subscription.cod,
        phoneNumber: subscription.tel,
        businessUnit,
        address: {
          city: `${subscription.zone} ${option[0].description}`,
          street: subscription.street
        },
        idType
      };
    }

    const data = {
      name: `${subscription.selection.title} / ${subscription.lastName}, ${
        subscription.name
      } / ${date}`,
      promotion: selection.promotionId,
      schema: selection.schemaId,
      customer: cliente,
      paymentMethod: subscription.paymentMethodId,
      address: {
        street: subscription.street,
        doorNumber: subscription.streetNumber,
        zipCode: subscription.zipCode,
        floor: subscription.floorApartment,
        apartment: subscription.apartment,
        district: subscription.neighborhood,
        zone: subscription.zone,
        state: option[0].description,
        city: `${subscription.zone} ${option[0].description}`,
        comments: subscription.additionalData
      },
      creditCard: subscription.cardNumber,
      creditCardInfo: {
        idNumber: subscription.cardNumber,
        cardOwner: subscription.cardOwner
      },
      cln: subscription.hasClubLaNacion
        ? subscription.clubLaNacionCardNumber
        : ''
    };

    // if (subscription.refered) {
    //   const newCustomer = {
    //     firstName: data.customer.firstName,
    //     lastName: data.customer.lastName,
    //     idNumber: data.customer.idNumber,
    //     idType: data.customer.idType,
    //     gender: data.customer.gender,
    //     taxType: data.customer.taxType,
    //     email: data.customer.email,
    //     phone: data.customer.phoneNumber,
    //     address: {
    //       street: data.address.street,
    //       city: data.address.zone,
    //       doorNumber: data.address.doorNumber
    //     },
    //     businessUnit: data.customer.businessUnit
    //   };
    //   const newGuid = yield call(bonvivirApi.postContactInfo, newCustomer);
    //   const newReference = {
    //     referred: subscription.refered,
    //     referrer: newGuid.data,
    //     businessUnit: data.customer.businessUnit
    //   };

    //   if (newGuid.status === 200) {
    //     const references = yield call(bonvivirApi.postReference, newReference);

    //     if (references.status === 200) {
    //       yield call(bonvivirApi.postSubscription, data);
    //     } else {
    //       // guardar en base
    //     }
    //   } else {
    //     // guardar en base
    //   }
    // } else {
    //   yield call(bonvivirApi.postSubscription, data);
    // }
    yield call(bonvivirApi.postSubscription, data);
    yield putResolve(push(SUBSCRIPTION));
  } catch (err) {
    throw err;
  }
}

export default function* sagas() {
  try {
    while (true) {
      const tasks = yield all([
        takeLatest(GET_SELECTIONS, getSelections),
        takeLatest(SAVE_LEAD, saveLead),
        takeLatest(SAVE_LEAD_STEP, saveLeadStep),
        takeLatest(VALIDATE_CLN_CARD_NUMBER, validateCLNCardNumber),
        takeLatest(STANDARDIZE_ADDRESS, standardizeAddress),
        takeLatest(GET_ACCEPTED_PAYMENT_METHODS, getAcceptedPaymentMethods),
        takeLatest(SEND_SUBSCRIPTION, sendSubscription),
        takeLatest(GO_TO_REGISTRATION, goToRegistration),
        takeLatest(BACK_FROM_REGISTRATION, backFromRegistration)
      ]);
      const { cancel: apiCancel, token: cancelToken } = CancelToken.source();

      cancelConfig.cancelToken = cancelToken;

      yield take(LOCATION_CHANGE);
      yield cancel(tasks);
      yield call(apiCancel);
    }
  } catch (err) {
    throw err;
  }
}
