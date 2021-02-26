import React from "react";
import { useHistory } from "react-router-dom";
import { Auth0Provider } from "@auth0/auth0-react";

// eslint-disable-next-line react/prop-types
const Auth0ProviderWithHistory = ({ children }) => {
    const domain = process.env.REACT_APP_AUTH0_DOMAIN || 'dev-rhj39xip.auth0.com';
    const clientId = process.env.REACT_APP_AUTH0_CLIENT_ID || 'UQDV2eoB00lgPYuyFXZpv7J00vhZmXP9';
    const history = useHistory();

    const onRedirectCallback = (appState) => {
        history.push(appState ? appState.returnTo : window.location.pathname);
    };

    return (
        <Auth0Provider
            domain={domain}
            clientId={clientId}
            redirectUri={window.location.origin}
            onRedirectCallback={onRedirectCallback}
        >
            {children}
        </Auth0Provider>
    );
};

export default Auth0ProviderWithHistory;