import { SET_CONTACT,SET_SUBSCRIPTIONS } from "../actions/profile";

const initialState = {
    contact:{},
    subscriptions:{},
    loading: true
}

const profileReducer = (state = initialState,action) => {
    switch(action.type){
        case SET_CONTACT:
            return {...state,contact:action.payload};
        case SET_SUBSCRIPTIONS:
            return {...state,loading:false,subscriptions:action.payload};
        default:
            return state;
    }
}

export default profileReducer;
