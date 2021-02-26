function addAttributes(user, context, callback) {
    user.user_metadata = user.user_metadata || {};
    const namespace = 'http://www.bonvivir.com/';
    context.idToken[namespace + 'dni'] = user.user_metadata.dni;
    
    callback(null, user, context);
  }