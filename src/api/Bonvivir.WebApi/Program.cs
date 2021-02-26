namespace Bonvivir.WebApi
{
    using Bonvivir.Persistance;
    using Microsoft.AspNetCore;
    using Microsoft.AspNetCore.Builder;
    using Microsoft.AspNetCore.Hosting;
    using Microsoft.EntityFrameworkCore;
    using Microsoft.Extensions.DependencyInjection;
    using Microsoft.Extensions.Logging;

    public static class Program
    {
        public static void Main(string[] args)
        {
            CreateWebHostBuilder(args).Build().MigrateDataBase<BonvivirDbContext>().Run();
        }

        public static IWebHostBuilder CreateWebHostBuilder(string[] args) =>
            WebHost.CreateDefaultBuilder(args)
                .ConfigureLogging(builder => builder.AddFile())
                .UseStartup<Startup>();
    }

    public static class MigrateDb
    {
        public static IWebHost MigrateDataBase<T>(this IWebHost webHost) where T : DbContext
        {
            using (var scope = webHost.Services.CreateScope())
            {
                var services = scope.ServiceProvider;
                var db = services.GetRequiredService<T>();
            }

            return webHost;
        }
    }
}
