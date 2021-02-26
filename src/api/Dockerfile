FROM mcr.microsoft.com/dotnet/core/sdk:2.2 AS build-env
WORKDIR /src
COPY . .
RUN dotnet restore

WORKDIR /src/Bonvivir.WebApi
RUN dotnet build --no-restore -c Release -o /app

FROM build-env as publish
RUN dotnet publish -c Release -o /app

# Build runtime image
FROM mcr.microsoft.com/dotnet/core/aspnet:2.2
WORKDIR /app

COPY --from=publish /app .
# COPY wait-for-it.sh /app/wait-for-it.sh 

EXPOSE 8080

CMD ["dotnet", "Bonvivir.WebApi.dll" ]

# install System.Drawing native dependencies
RUN apt-get update \
    && apt-get install -y --allow-unauthenticated \
        libc6-dev \
        libgdiplus \
        libx11-dev \
     && rm -rf /var/lib/apt/lists/*
