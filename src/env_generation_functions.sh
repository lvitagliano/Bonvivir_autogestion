getEnvironment() {
  if [ $environment = "prod" ]; then
    file_name=".$environment.env"
    aspnetcoreenvironment="Production"
    dockercommand="docker-compose -f docker-compose.$environment.yml up"
    dockerbuildcommand="docker-compose -f docker-compose.$environment.yml build --no-cache"
  elif [ $environment = "test" ]; then
    file_name=".$environment.env"
    aspnetcoreenvironment="Testing"
    dockercommand="docker-compose -f docker-compose.$environment.yml up"
    dockerbuildcommand="docker-compose -f docker-compose.$environment.yml build --no-cache"
  elif [ $environment = "dev" ]; then
    file_name=".$environment.env"
    aspnetcoreenvironment="Development"
    dockercommand="docker-compose up -d"
    dockerbuildcommand="docker-compose build --no-cache"
  fi
}

getEnvVariables() {

  echo "REACT_APP_URL_API: (http://localhost)"
  read reactappurlapi
  if [ -z "$reactappurlapi" ]; then
    reactappurlapi="http://localhost"
  fi

  echo "REACT_APP_PORT_API: (8080)"
  read reactappportapi
  if [ -z "$reactappportapi" ]; then
    reactappportapi="8080"
  fi

  echo "ASPNETCORE_URLS: (http://+:8080)"
  read aspnetcoreurls
  if [ -z "$aspnetcoreurls" ]; then
    aspnetcoreurls="http://+:8080"
  fi

  while [ -z "$connectionstring" ]; do
    echo "CONNECTION_STRING:"
    read connectionstring
    if [ -z "$connectionstring" ]; then
      echo "CONNECTION_STRING variable is required."
    fi
  done
}

writeEnvFile() {
  echo "REACT_APP_URL_API=$reactappurlapi" >$file_name
  echo "REACT_APP_PORT_API=$reactappportapi" >>$file_name

  echo -e "\n" >>$file_name

  echo "ASPNETCORE_URLS=$aspnetcoreurls" >>$file_name
  echo "ASPNETCORE_ENVIRONMENT=$aspnetcoreenvironment" >>$file_name

  echo -e "\n" >>$file_name

  echo "CONNECTION_STRING=$connectionstring" >>$file_name

}
