export const SET_CONTACT = 'SET_CONTACT';
export const SET_SUBSCRIPTIONS = 'SET_SUBSCRIPTIONS';
export const SET_ORDERS = 'SET_ORDERS';

export const setContact = (value) => ({
    type:SET_CONTACT,
    payload:value
});

export const setSubscriptions = (value) => ({
    type:SET_SUBSCRIPTIONS,
    payload:value
});

export const setOrders= (value) => ({
    type:SET_ORDERS,
    payload:value
});