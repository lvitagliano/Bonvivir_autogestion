const AUTH0CONFIG = {
    'DOMAIN': process.env.REACT_APP_AUTH0_DOMAIN,
    'CLIENT_ID': process.env.REACT_APP_AUTH0_CLIENT_ID,
    'CONNECTION': 'Username-Password-Authentication',
    'API_URL': `https://${process.env.REACT_APP_AUTH0_DOMAIN}/dbconnections/change_password`
};

export default AUTH0CONFIG;