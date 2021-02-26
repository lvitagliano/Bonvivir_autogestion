import React, { useEffect, useState } from 'react';
import { useSelector, useDispatch } from 'react-redux';

import { MESSAGES } from '../../config/messages';
import ModalMsj from '../../components/ModalMsj';
import NavBAr from '../../components/NavBar';
import { clearSubscriptionForm } from '../../actions/subscription';

const SubscriptionView = () => {
  const [objSubscripton, setObjSubscription] = useState(
    useSelector(state => state.subscription)
  );
  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(clearSubscriptionForm());
  }, []);

  return (
    <div id='app'>
      <NavBAr textTitle='' />
      <section
        className='main-container main-container__subscription-bg container-fluid'
        style={{
          width: '100%',
          // height: '100%',
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'center',
          alignItems: 'center',
          // backgroundAttachment: 'fixed'
        }}
      >
        <ModalMsj
          title={MESSAGES.TITLE_END_SUBSCRIPTION}
          subtitle={MESSAGES.SUBTITLE_END_SUBSCRIPTION}
          description={MESSAGES.MSG_END_SUBSCRIPTION}
          data={objSubscripton}
        />
      </section>
    </div>
  );
};

export default SubscriptionView;
