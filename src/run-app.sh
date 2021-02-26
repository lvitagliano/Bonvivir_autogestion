#!/bin/sh

source ./env_generation_functions.sh

while [ "$environment" != "prod" ] && [ "$environment" != "dev" ] && [ "$environment" != "test" ]; do
  echo "Please choice a environment: (dev/test/prod)"
  read environment
done

getEnvironment

if [ "$1" = "--rebuild" ]; then
  dockercommand="$dockerbuildcommand && $dockercommand"
fi

if [ -f $file_name ]; then
  $dockercommand
else
  echo "$file_name not exists, Do you want to create it? (yes/no)"

  read option

  if [ $option = "yes" ]; then

    echo "This utility will walk you through creating a $file_name file."
    echo "Define environment variables:"

    getEnvVariables

    writeEnvFile

    if [ -f $file_name ]; then
      $dockercommand
    else
      echo "Error creating $file_name file."
    fi

  else
    echo "docker-compose cannot start if $file_name doesn't not exist."
  fi
fi
