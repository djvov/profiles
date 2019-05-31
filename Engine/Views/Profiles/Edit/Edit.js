window.onload = function() {
    // set main email and phone from db
    var str_emails_main = '';
    var emailList = document.querySelectorAll('.emails .email');
    var i = 0;
    emailList.forEach(function (el) {
        if (el.classList.contains('main')) {
            str_emails_main = i;
        }
        i++;
     });
    if (str_emails_main == '') str_emails_main = '0';
    document.querySelectorAll('#emailsMain').forEach(function (el) { el.value = str_emails_main; });

    var str_phones_main = '';
    var phoneList = document.querySelectorAll('.phones .phone');
    var i = 0;
    phoneList.forEach(function (el) {
        if (el.classList.contains('main')) {
            str_emails_main = i;
        }
        i++;
     });
    if (str_phones_main == '') str_phones_main = '0';
    document.querySelectorAll('#phonesMain').forEach(function (el) { el.value = str_phones_main; });

    setMask();
}

function setMask() {
    // set phone input mask
    document.querySelectorAll('.phone-inp').forEach(function (el) { var phoneMask = IMask(el, {mask: '+{7} (000) 000-00-00'}); })
}

function setMainEmail(obj) {
    var data_email_id = obj.parentNode.getAttribute('data-email-id');
    var emailList = document.querySelectorAll('.emails .email');
    emailList.forEach(function (el) { el.classList.remove('main'); });
    var emailList = document.querySelectorAll('.emails .email[data-email-id="' + data_email_id + '"]');
    emailList.forEach(function (el) { el.classList.add('main'); });
    var emailList = document.querySelectorAll('.emails .email');
    var str_emails_main = '';
    var i = 0;
    emailList.forEach(function (el) {
        if (el.classList.contains('main')) {
            str_emails_main = i;
        }
        i++;
     });
    document.querySelectorAll('#emailsMain').forEach(function (el) { el.value = str_emails_main; });
}

function setMainPhone(obj) {
    var data_phone_id = obj.parentNode.parentNode.getAttribute('data-phone-id');
    var phoneList = document.querySelectorAll('.phones .phone');
    phoneList.forEach(function (el) { el.classList.remove('main'); });
    var phoneList = document.querySelectorAll('.phones .phone[data-phone-id="' + data_phone_id + '"]');
    phoneList.forEach(function (el) { el.classList.add('main'); });
    var phoneList = document.querySelectorAll('.phones .phone');
    var str_phones_main = '';
    var i = 0;
    phoneList.forEach(function (el) {
        if (el.classList.contains('main')) {
            str_phones_main = i;
        }
        i++;
     });
    document.querySelectorAll('#phonesMain').forEach(function (el) { el.value = str_phones_main; });
}

function addEmail(profile_id) {
    var emailСontainerList = document.querySelectorAll('.emails');
    var emailСontainer = emailСontainerList[0];
    var emailList = document.querySelectorAll('.emails .email');
    var emailListCount = emailList.length + 1;
    var emailEl = emailList[0];
    var emailEl_copy = emailEl.cloneNode(true);
    emailEl_copy.querySelectorAll('input').forEach(function (el) {
        el.value = '';
        if (profile_id > 0) {
            el.setAttribute('name', 'email[' + profile_id + '][add][]');
        }
    });
    emailEl_copy.setAttribute('data-email-id', emailListCount);
    emailEl_copy.classList.remove('main');
    emailСontainer.appendChild(emailEl_copy);
}

function addPhone(profile_id) {
    var phoneСontainerList = document.querySelectorAll('.phones');
    var phoneСontainer = phoneСontainerList[0];
    var phoneList = document.querySelectorAll('.phones .phone');
    var phoneListCount = phoneList.length + 1;
    var phoneEl = phoneList[0];
    var phoneEl_copy = phoneEl.cloneNode(true);
    phoneEl_copy.querySelectorAll('input').forEach(function (el) {
        el.value = '';
        if (profile_id > 0) {
            el.setAttribute('name', 'phone[' + profile_id + '][add][]');
        }
    });
    phoneEl_copy.querySelectorAll('select').forEach(function (el) {
        el.value = '';
        if (profile_id > 0) {
            el.setAttribute('name', 'phone_type[' + profile_id + '][add][]');
        }
    });
    phoneEl_copy.setAttribute('data-phone-id', phoneListCount);
    phoneEl_copy.classList.remove('main');
    phoneСontainer.appendChild(phoneEl_copy);
    setMask();
}

function deleteEmail(event) {
    var trgt = event.target;
    var email_id = 0;
    var email_div = trgt.parentNode.parentNode;
    var email_inp_list = trgt.parentNode.parentNode.querySelectorAll('input');
    var email_inp = email_inp_list[0];
    var name = email_inp.getAttribute('name');
    var n = name.indexOf("add");

    // check if email added in run time or exist in db
    // get email id from field name throught regexp
    if (n == -1) {
        var myregexp = /email\[\d*\]\[(\d*)\]/;
        var match = myregexp.exec(name);
        if (match != null) {
            result = match[1];
        } else {
            result = "";
        }
        if (result > 0) {
            email_id = result;
        }
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Profiles/deleteEmail/?email_id=' + email_id, true);
        xhr.send();
        xhr.onloadend  = function() {
            var response = xhr.responseText;
            var jsn = JSON.parse(response);
            if (jsn.result > 0) {
                trgt.parentNode.parentNode.remove();
            }
        }
    } else {
        trgt.parentNode.parentNode.remove();
    }
}

function deletePhone(event) {
    var trgt = event.target;
    var phone_id = 0;
    var phone_div = trgt.parentNode.parentNode;
    var phone_inp_list = trgt.parentNode.parentNode.parentNode.querySelectorAll('input');
    var phone_inp = phone_inp_list[0];
    var name = phone_inp.getAttribute('name');
    var n = name.indexOf("add");

    // check if phone added in run time or exist in db
    // get phone id from field name throught regexp
    if (n == -1) {
        var myregexp = /phone\[\d*\]\[(\d*)\]/;
        var match = myregexp.exec(name);
        if (match != null) {
            result = match[1];
        } else {
            result = "";
        }
        if (result > 0) {
            phone_id = result;
        }
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Profiles/deletePhone/?phone_id=' + phone_id, true);
        xhr.send();
        xhr.onloadend  = function() {
            var response = xhr.responseText;
            var jsn = JSON.parse(response);
            if (jsn.result > 0) {
                trgt.parentNode.parentNode.parentNode.remove();
            }
        }
    } else {
        trgt.parentNode.parentNode.parentNode.remove();
    }
}
