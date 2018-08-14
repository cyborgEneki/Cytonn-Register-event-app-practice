var api_url = '';

switch( process.env.NODE_ENV ){
    case 'development':
        api_url = 'http://enekifinalproject.test';
        break;
    case 'production':
        api_url = '#';
        break;
}

switch( process.env.NODE_ENV ){
    case 'development':
        api_url = 'http://enekifinalproject.test';
        break;
    case 'production':
        api_url = '#';
        break;
}

export const REGISTER_CONFIG = {
    API_URL: api_url,
}