
$(function(){
	$(".advice").on('click', function(){
    popup({width: '520px'}, "Contact Sales", "<span style='margin-bottom:0.5rem;display:block;'>Fill out the information to contact sales</span><form style='display:inline-block;' id='contact-sales-form'>        <input l placeholder='Name' class='name' required><input l plain placeholder='Company' class='company'><input l placeholder='Email' style='margin-bottom:0.5rem' id='contact-sales-email-input' required pattern=\"[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\"><input l plain placeholder='Phone' class='phone'><textarea placeholder='Type your message...' l class='message' required></textarea>        <button class='btn btn-primary' style='margin-bottom:0.5rem;' id='contact-sales'><span style='line-height:1;' class='sub-btn' id='downloadthis'>Submit</span><div class='lds-ring sub-load'><div></div><div></div><div></div><div></div></div></button>      </form>");
    setTimeout(function () {
        setupContactSales('contact-sales', 'contact-sales-form', 'contact-sales-email-input');
    },400);
  });

});


function contactSales(form) {
  let name = $("#" + form + " .name").val();
  let cmp = $("#" + form + " .company").val();
  let msg = $("#" + form + " .message").val();
  let phone = $("#" + form + " .phone").val();
  let email = $("#" + form + " #contact-sales-email-input").val();
  let message = "<h1>" +name + " wishes to contact sales</h1><p>Email: " + email + "</p>";
  $("#" + form + " .sub-load").css('display', 'inline-block');
  $("#" + form + " .sub-btn").css('display', 'none');
  if (phone != "") {
    message += "<p>Phone: " + phone + "</p>";
  }
  if (cmp != "") {
    message += "<p>Company: " + cmp + "</p>";
  }
  message += "<p>Their message:</p><p>" + msg + "</p>";
  $.post(globalSiteRoot + 'assets/globalscripts/email.php', {
    from: 'support@taosdata.com',
    fromname: email,
    to: 'jhtao@taosdata.com',
    subject: 'Contact Sales',
    message:message,
    successmsg:"Successfully contacted sales",
    errormsg:"Apologies, unable to contact sales at the time"
  }).done(function (data) {
    let res = JSON.parse(data)[0];
    console.log(res);
    bannerup("", "<span>" + res.message + "</span>")
    $("#" + form + " .sub-btn").css('display', 'inline-block');
    $("#" + form + " .sub-load").css('display', 'none');
    if (res.status=='success'){
    $.post(globalSiteRoot + 'assets/globalscripts/email.php', {
      from: 'support@taosdata.com',
      fromname: 'TAOS Data Support',
      to: email,
      subject: 'Contact Sales Confirmation',
      message:'<h1>You succesfully contacted sales</h1><p>Your Message:</p><p>' +msg +'</p>'
    });
    }
  });
}


function setupContactSales(button, form, emailInput) {
  $("#" + button).on('click', function (e) {
    e.preventDefault();
    //parse email. check for validity;
    let email = $("#" + emailInput).val();

    if ($("#" + form + " .name").val() == "") {
      let ele = $("#" + form + " .name");
      $('#' + form + " .name").addClass('invalid-input');
      ele[0].setCustomValidity('Please enter your name');
      ele[0].reportValidity();
      return false;
    }
    else {
      $("#" + form + " .name").removeClass('invalid-input');
    }
    if (validateEmail(email)) {
      $('#' + emailInput).removeClass('invalid-input');
      $('#' + emailInput).addClass('valid-input');
      document.getElementById(emailInput).setCustomValidity('');

    } else {
      document.getElementById(emailInput).setCustomValidity('Invalid email');
      $('#' + emailInput).addClass('invalid-input');
      document.getElementById(emailInput).reportValidity()
      return false;
    }
    
    if ($("#" + form + " .message").val() == "") {
      let ele = $("#" + form + " .message");
      ele.addClass('invalid-input');
      ele[0].setCustomValidity('Please type a message');
      ele[0].reportValidity();
      return false;
    }
    else {
      let ele = $("#" + form + " .message");
      ele.removeClass('invalid-input');
    }
    let res = contactSales(form);
    //play animation while email result comes back;
    return false;
  });
  $(document).keyup(function (e) {
    if (e.which == 'Enter') {
      $("#" + button).click();
      return false;
    }
  });
  $("#" + emailInput).on('keydown', function () {
    document.getElementById(emailInput).setCustomValidity('');
  });
}



