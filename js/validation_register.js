
function Validate_register() {
            var name = document.forms["registration"]["name"];
            var email = document.forms["registration"]["email"];
            var password = document.forms["registration"]["password"];
            var confirmpass = document.forms["registration"]["confirmpass"];
            var age = document.forms["registration"]["age"];
            var bgroup = document.forms["registration"]["bgroup"];
            var weight = document.forms["registration"]["weight"];
            var phone = document.forms["registration"]["phone"];
            var mobile = document.forms["registration"]["mobile"];
            var address = document.forms["registration"]["address"];
            var state = document.forms["registration"]["state"];
            var city = document.forms["registration"]["city"];

            if (name.value != "")
            {
              if (!name.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
              document.getElementById('name_error').innerHTML
              = 'Please Enter alphabet characters only';
                name.focus();
                return false;
              }
            }

            else {
              document.getElementById('name_error').innerHTML
              = 'Please enter name';
                name.focus();
                return false;
            }


            if (password.value == "")
            {
              document.getElementById('password_error').innerHTML
              = 'Please Enter password';
                password.focus();
                return false;
            }



            if (email.value == "")
            {
              document.getElementById('email_error').innerHTML
              = 'Please Enter email Id';
                email.focus();
                return false;
            }

            var x=document.registration.email.value;
            var atposition=x.indexOf("@");
            var dotposition=x.lastIndexOf(".");
            if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
              document.getElementById('email_error').innerHTML
                = 'Please enter valid Email id!';
              email.focus();
              return false;
            }

            if (confirmpass.value == "")
            {
              document.getElementById('confirmpass_error').innerHTML
              = 'Please Enter Confirm Password';
                confirmpass.focus();
                return false;
            }

            if (password.value != confirmpass.value) {
              document.getElementById('confirmpass_error').innerHTML
                = 'Password do not match!';
              confirmpass.focus();
              return false;
            }

              if (age.value < 18) {
                document.getElementById('age_error').innerHTML
                = 'Minimum age required is 18';
                age.focus();
                return false;
              }

            if(bgroup.selectedIndex==0)
            { document.getElementById('bgroup_error').innerHTML
            = 'Please select blood group!';
            bgroup.focus();
            return false;
            }

            if (weight.value == "")
            {
              document.getElementById('weight_error').innerHTML
              = 'Please Enter weight';
                weight.focus();
                return false;
            }

            var a=document.registration.weight.value;

            if (isNaN(a) || a < 50){
              document.getElementById('weight_error').innerHTML
              = 'Minimum weight required 50Kg!';
                weight.focus();
                return false;
              }


            if (phone.value != "") {
              if (isNaN(phone.value) || !phone.value.match(/^\d{10}$/)) {
                document.getElementById('phone_error').innerHTML
                = 'Please enter valid phone Number!';
                phone.focus();
                return false;
              }
            }


            if (mobile.value == "")
            {
              document.getElementById('mobile_error').innerHTML
              = 'Please Enter Mobile No.';
                mobile.focus();
                return false;
            }

            var c=document.registration.mobile.value;
            if (isNaN(c)){
              document.getElementById('mobile_error').innerHTML
              = 'Please enter valid mobile Number!';
                mobile.focus();
                return false;
              }

            if (!mobile.value.match(/^\d{10}$/)) {
              document.getElementById('mobile_error').innerHTML
              = 'Please enter valid mobile Number!';
                mobile.focus();
                return false;
            }


            if (address.value == "")
            {
              document.getElementById('address_error').innerHTML
              = 'Please Enter Address';
                address.focus();
                return false;
            }

            if(state.selectedIndex==0)
            { document.getElementById('state_error').innerHTML
            = 'Please select state!';
            state.focus();
            return false;
            }

            if(city.selectedIndex==0)
            { document.getElementById('city_error').innerHTML
            = 'Please select city!';
            city.focus();
            return false;
            }


  return true;



}
