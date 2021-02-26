using System;
using System.IO;
using System.Threading.Tasks;
using Bonvivir.Infrastructure.Contracts;
using MailKit.Net.Smtp;
using MailKit.Security;
using MimeKit;

namespace Bonvivir.Infraestructure
{
    public class EMailClient : IEmailClient
    {
        public async Task SendSubscriptionEmailAsync(EmailDTO mailRequest)
        {
            string filePath = Path.Combine("template", "newSubscriptionEmail.html");
            StreamReader str = new StreamReader(filePath);
            string emailText = str.ReadToEnd();
            str.Close();

            emailText = emailText
                .Replace("[name]", mailRequest.Subscription.Customer.FirstName)
                .Replace("[lastName]", mailRequest.Subscription.Customer.LastName)
                .Replace("[areaCode]", mailRequest.Subscription.Customer.Phone.AreaCode)
                .Replace("[number]", mailRequest.Subscription.Customer.Phone.Number)
                .Replace("[email]", mailRequest.Subscription.Customer.Email)
                .Replace("[idType]", mailRequest.Subscription.Customer.IdType)
                .Replace("[idNumber]", mailRequest.Subscription.Customer.IdNumber)
                .Replace("[street]", mailRequest.Subscription.Address.Street)
                .Replace("[doorNumber]", mailRequest.Subscription.Address.DoorNumber)
                .Replace("[zipCode]", mailRequest.Subscription.Address.ZipCode)
                .Replace("[floor]", mailRequest.Subscription.Address.Floor)
                .Replace("[apartment]", mailRequest.Subscription.Address.Apartment)
                .Replace("[district]", mailRequest.Subscription.Address.District)
                .Replace("[zone]", mailRequest.Subscription.Address.Zone)
                .Replace("[state]", mailRequest.Subscription.Address.State)
                .Replace("[city]", mailRequest.Subscription.Address.City)
                .Replace("[comments]", mailRequest.Subscription.Address.Comments)
                .Replace("[cardOwner]", mailRequest.Subscription.CreditCard.CardOwner)
                .Replace("[creditCard]", mailRequest.Subscription.CreditCard.IdNumber);

            var email = new MimeMessage();
            email.Sender = MailboxAddress.Parse(Environment.GetEnvironmentVariable("EMAIL_SENDER") ?? "atencionalsocio@bonvivir.com");
            email.From.Add(MailboxAddress.Parse(Environment.GetEnvironmentVariable("EMAIL_SENDER") ?? "atencionalsocio@bonvivir.com"));
            email.To.Add(MailboxAddress.Parse(mailRequest.Subscription.Customer.Email));
            email.Subject = "¡Te damos la Bienvenida a BONVIVIR!";

            var builder = new BodyBuilder();
            builder.HtmlBody = emailText;
            email.Body = builder.ToMessageBody();

            using var smtp = new SmtpClient();

            smtp.Connect((Environment.GetEnvironmentVariable("EMAIL_HOST") ?? "smtp.mailtrap.io"),
                        Int16.Parse(Environment.GetEnvironmentVariable("EMAIL_PORT") ?? "587"),
                        SecureSocketOptions.None);

            smtp.Authenticate((Environment.GetEnvironmentVariable("EMAIL_USERNAME") ?? "0ee8b42e6f1300"),
                              (Environment.GetEnvironmentVariable("EMAIL_PASSWORD") ?? "fa42be6aef8689"));

            await smtp.SendAsync(email);

            smtp.Disconnect(true);
        }
    }
}