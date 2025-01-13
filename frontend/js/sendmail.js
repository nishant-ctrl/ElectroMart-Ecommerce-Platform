const form = document.querySelector("form");
function sendEmail() {
  Email.send({
    Host: "smtp.mailendo.com",
    Username: "electromart251@gmail.com",
    Password: "50A5006E08FB942E58A231FE2C11B69DD395",
    To: "electromart251@gmail.com",
    From: "electromart251@gmail.com",
    Subject: "This is the subject",
    Body: "And this is the body",
  }).then((message) => alert(message));
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  sendEmail();
});