import { object, bool, string, ref } from 'yup';

import validateCardNumber from '../../utils/validateCardNumber';
import { isAcceptedCardMock, defaultCard } from '../../utils/cardTypesMock';
import ERROR_MESSAGES from '../../config/errorMessages';

const aria = {
  cardNumber: 'cardNumber',
  cardOwner: 'cardOwner'
};

const keys = {
  suscriptionCard: 'suscriptionCard',
  cardNumber: 'cardNumber',
  cardType: 'cardType',
  cardOwner: 'cardOwner',
  authorizationClubBonvivir: 'authorizationClubBonvivir',
  paymentMethodId: 'paymentMethodId'
};

const limits = {
  max: {
    cardNumber: 16,
    cardOwner: 30
  }
};

const defaultValues = {
  cardNumber: '',
  cardType: defaultCard,
  cardOwner: '',
  authorizationClubBonvivir: false,
  paymentMethodId: ''
};

const defaultSchema = acceptedPaymentMethods =>
  object().shape({
    cardNumber: string()
      .trim()
      .required(ERROR_MESSAGES.CARD_NUMBER_REQUIRED)
      .test('Card number validation', ERROR_MESSAGES.CARD_NUMBER_VALID, value =>
        validateCardNumber(value)
      )
      .test(
        'Acceptable credit card',
        ERROR_MESSAGES.CARD_NUMBER_ACCEPT,
        function() {
          const card = this.resolve(ref(keys.cardType));

          return isAcceptedCardMock(card, acceptedPaymentMethods);
        }
      )
      .test('Credit card length', ERROR_MESSAGES.CARD_NUMBER_MAX, function(
        value
      ) {
        const card = this.resolve(ref(keys.cardType));

        return card && value && value.length === card.length;
      }),
    cardOwner: string()
      .trim()
      .required(ERROR_MESSAGES.CARD_OWNER_REQUIRED)
      .max(
        limits.max.cardOwner,
        `${ERROR_MESSAGES.CARD_OWNER_MAX} ${limits.max.cardOwner} ${
          ERROR_MESSAGES.CHARACTERS
        }`
      ),
    authorizationClubBonvivir: bool().oneOf(
      [true],
      ERROR_MESSAGES.AUTHORIZATION_REQUIRED
    ),
    paymentMethodId: string().required()
  });

export { defaultValues, defaultSchema, keys, limits, aria };
