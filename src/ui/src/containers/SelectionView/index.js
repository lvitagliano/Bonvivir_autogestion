import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import { createStructuredSelector } from 'reselect';
import uuidv1 from 'uuid/v1';

import subscriptionActions from '../../actions/subscription';
import backofficeActions from '../../actions/backoffice';
import { makeGetSubscription } from '../../selectors/subscription';
import { makeGetBackoffice } from '../../selectors/backoffice';
import {
  NavBar,
  Selection,
  SelectionMobile,
  Button,
  Loading
} from '../../components';
import { mapOfferToOption } from '../../utils/mapOfferToOption';
import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import logoNacion from '../../resources/images/la-nacion.png';
import { MESSAGES } from '../../config/messages';
import { CONSTANTS } from '../../config/constants';

import labels from './labels';

class SelectionView extends Component {
  constructor(props) {
    super(props);
    this._UUID = uuidv1();
  }

  static propTypes = {
    subscription: PropTypes.object.isRequired,
    backoffice: PropTypes.object.isRequired,
    goToRegistration: PropTypes.func.isRequired,
    changeHasClubLaNacion: PropTypes.func.isRequired,
    setSelectionSelected: PropTypes.func.isRequired,
    setSelectionDetailSelected: PropTypes.func.isRequired,
    getSelections: PropTypes.func.isRequired,
    getOffers: PropTypes.func.isRequired,
    
  };

  componentDidMount = () => {
    const { getSelections } = this.props;
    const { getOffers } = this.props;

    getOffers();
    getSelections();
  };

  handleSelectOption = event => {
    const {
      subscription: { selectionSelected },
      setSelectionSelected
    } = this.props;
    const id = Number(event.currentTarget.id);

    if (selectionSelected !== id) {
      setSelectionSelected(id);
    }
  };

  handleChangeSelectDetail = event => {
    const {
      subscription: { selectionDetailSelected },
      setSelectionDetailSelected
    } = this.props;
    const id = Number(event.target.id);

    if (selectionDetailSelected !== id) {
      setSelectionDetailSelected(id);
    }
  };

  renderSelections = (refer) => {
    const {
      backoffice: { offers },
      subscription: {
        options,
        selectionSelected,
        selectionDetailSelected,
        hasClubLaNacion
      },
      goToRegistration,
      changeHasClubLaNacion
    } = this.props;

    let newOptions = options;

    if (offers) {
      const organic = offers.find(o => o.isOrganic === true);

      if (organic) {
        newOptions = mapOfferToOption(options, organic);
      } else {
        newOptions.forEach(option => {
          option.selectionDetails.forEach(sd => {
            sd.disabled = true;
          });
        });
      }
    }

    return (
      <div className='row'>
        <div className='col-md-12'>
          <div className='container'>
            <div className='row'>
              <SelectionMobile
                options={newOptions}
                selectionSelected={selectionSelected}
                selectionDetailSelected={selectionDetailSelected}
                onClickSelection={this.handleSelectOption}
                onClickRadio={this.handleChangeSelectDetail}
              />
              {newOptions.map((o, i) => (
                <Selection
                  key={uuidv1()}
                  id={`${i}`}
                  item={o}
                  selected={selectionSelected === i}
                  selectedDetail={selectionDetailSelected}
                  onClick={this.handleSelectOption}
                  onClickRadio={this.handleChangeSelectDetail}
                />
              ))}
            </div>
          </div>
          <div className='row main-container__footer hidden-xs'>
            <div className='col-md-offset-4 col-md-2'>
              <img
                className='main-container__footer__img'
                src={logoNacion}
                alt='logo'
              />
              <span className='main-container__footer__info helpers__inline-b'>
                <p>{MESSAGES.DISCOUNT_CLUB_LA_NACION[0]}</p>
                <p>{MESSAGES.DISCOUNT_CLUB_LA_NACION[1]}</p>
              </span>
            </div>
            <div className='main-container__footer__check col-md-3'>
              <label
                className='checkbox'
                htmlFor='firstName'
                name='subscribeLaNacion'
              >
                <input
                  type='checkbox'
                  name='subscribeLaNacion'
                  checked={hasClubLaNacion}
                  onChange={changeHasClubLaNacion}
                />
                <span
                  className='checkmark'
                  role='button'
                  onClick={changeHasClubLaNacion}
                  onKeyPress={changeHasClubLaNacion}
                  tabIndex={0}
                />
                <p>{labels.subscribeLaNacion}</p>
              </label>
            </div>
          </div>
          <div className='row'>
            <Button
              description={MESSAGES.BUTTON_CONTINUE}
              divClassName='col-md-12 main-container__footer__button helpers__text-center'
              buttonClassName='button__primary'
              onClick={() => goToRegistration(refer)}
              disabled={
                selectionDetailSelected ===
                  CONSTANTS.INITIAL_SELECTION_DETAIL_SELECTED ||
                options[selectionSelected].selectionDetails[
                  selectionDetailSelected
                ].disabled
              }
            />
          </div>
        </div>
      </div>
    );
  };

  render() {
    const referId = this.props.match.params.refId
    const key = `APP_${this._UUID}`;
    const {
      backoffice: { offers },
      subscription: { loading }
    } = this.props;

    return (
      <div id='app' key={key}>
        {loading || offers === null ? (
          <Loading show withLogo />
        ) : (
          <div>
            <NavBar textTitle={MESSAGES.TITLE_REGISTRATION} />
            <section className='main-container container-fluid'>
              {this.renderSelections(referId)}
            </section>
          </div>
        )}
      </div>
    );
  }
}

const mapStateToProps = createStructuredSelector({
  subscription: makeGetSubscription(),
  backoffice: makeGetBackoffice()
});

const mapDispatchToProps = dispatch => ({
  getOffers: () => dispatch(backofficeActions.getOffers()),
  goToRegistration: referId => dispatch(subscriptionActions.goToRegistration(referId)),
  setFromSelection: () => dispatch(subscriptionActions.setFromSelection()),
  changeHasClubLaNacion: value =>
    dispatch(subscriptionActions.changeHasClubLaNacion(value)),
  setSelectionSelected: value =>
    dispatch(subscriptionActions.setSelectionSelected(value)),
  setSelectionDetailSelected: value =>
    dispatch(subscriptionActions.setSelectionDetailSelected(value)),
  getSelections: () => dispatch(subscriptionActions.getSelections())
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(SelectionView);
