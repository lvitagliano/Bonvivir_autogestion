const CONSTANTS = {
  URL_API: `/`,
  URL_SAMPLE_API: process.env.REACT_APP_URL_SAMPLE_API,
  INITIAL_PAGE: 1,
  RESULTS_LIMIT: 30,
  SNACKBAR_VARIANTS: {
    SUCCESS: 'success',
    WARNING: 'warning',
    ERROR: 'error',
    INFO: 'info'
  },
  VOID_FUNC: () => {},
  INITIAL_STEP: 1,
  INITIAL_SELECTION_SELECTED: 0,
  // eslint-disable-next-line no-undefined
  INITIAL_SELECTION_DETAIL_SELECTED: undefined,
  INITIAL_FIELD_STEP: 1,
  MAX_STEP: 4,
  ANIMATIONS: {
    DESKTOP: [52, 35, 20, 7],
    MOBILE: [75, 45, 35, 15]
  },
  MONTHS: [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
  ],
  MONTHSOBJET: [
    {'id':1, 'name':'Enero'},
    {'id':2, 'name':'Febrero'},
    {'id':3, 'name':'Marzo'},
    {'id':4, 'name':'Abril'},
    {'id':5, 'name':'Mayo'},
    {'id':6, 'name':'Junio'},
    {'id':7, 'name':'Julio'},
    {'id':8, 'name':'Agosto'},
    {'id':9, 'name':'Septiembre'},
    {'id':10, 'name':'Octubre'},
    {'id':11, 'name':'Noviembre'},
    {'id':12, 'name':'Diciembre'}
  ],
  BACKOFFICE_DATE_FORMAT: 'DD/MM/YYYY',
  BACKOFFICE_HEADER_BUTTON: {
    icon: 'fas fa-plus',
    value: 'Nueva oferta',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_LOGOUT_BUTTON: {
    icon: 'fas fa-sign-out-alt',
    value: 'Cerrar Sesion',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_EDIT: {
    icon: 'fas fa-pen',
    value: '   Editar',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_DELETE: {
    icon: 'far fa-trash-alt',
    value: '   Eliminar',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_NEW_ITEM: {
    icon: 'fas fa-plus',
    value: '   Nuevo item',
    style: 'float-right'
  },
  BACKOFFICE_CREATE: {
    icon: 'fas fa-check',
    value: 'Crear',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_SAVE: {
    icon: 'far fa-save',
    value: 'Guardar',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_GENERATE_LINK: {
    icon: 'fas fa-link adj',
    value: 'Generar link',
    style: 'link-button'
  },
  BACKOFFICE_ERROR_LIST: {
    icon: 'fas fa-clipboard-list',
    value: 'Suscripciones',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_EXPORT_CSV: {
    icon: 'fas fa-clipboard-list',
    value: 'Exportar a CSV',
    style: 'buttons-backoffice'
  },
  BACKOFFICE_ACCEPT_FILES: '.jpg,.png',
  SUBJECT_REQUEST: 'Call Me- ATG',
  ENV_PRODUCTION: 'production',
  BACKOFFICE_INITIAL_PAGE: 1,
  BACKOFFICE_INITIAL_QTY_PER_PAGE: 5,
  BACKOFFICE_GO_TO_FIRST_PAGE: '<',
  BACKOFFICE_GO_TO_LAST_PAGE: '>',
  BACKOFFICE_PREVIOUS: 'Anterior',
  BACKOFFICE_NEXT: 'Siguiente',
  BACKOFFICE_CSV: '.csv',
  PLACEHOLDER_SEARCH: 'Ingresá un codigo de error',
  PLACEHOLDER_EXPORT: 'SuscripcionesConError',
  GET_CONTACT: '/api/Contact/GetContact/',
  GET_CONTACT_LOCAL: '/api/Contact/GetCustomer/',
  GET_SUBSCRIPTION_KW: '/api/Subscription/get/kw/',
  GET_SUBSCRIPTION: '/api/Subscription/get/ag/',
  GET_OFFER_ITEMS_FOR_SCHEMA: '/api/OfferItems/get/ag/',
  GET_OFFERTS: '/api/Offers',
  POST_REFERS: '/api/ReferFriend/save',
  POST_LEADS: '/api/leads',
  GET_ORDERS: 'api/Order/Get/'
};

export { CONSTANTS };
