var fnameError = document.getElementById('f_name_error');
var lnameError = document.getElementById('l_name_error');
var fatherError = document.getElementById('father_error');
var motherError = document.getElementById('mother_error');
var emailError = document.getElementById('email_error');
var phoneError = document.getElementById('phone_error');
var presentaddressError = document.getElementById('present_address_error');
var permanentaddressError = document.getElementById('permanent_address_error');
var dofError = document.getElementById('dof_error');
var nationalityError = document.getElementById('nationality_error');
var nationalid_error = document.getElementById('nationalid_error');
var bankError = document.getElementById('bank_error');
var bankacError = document.getElementById('bank_ac_error');
var imageError = document.getElementById('image_error');
var cvError = document.getElementById('cv_error');
var passwordError = document.getElementById('password_error');
var repasswordError = document.getElementById('repassword_error');

function validateFName() {
   var fname = document.getElementById('f_name').value;

   if (fname.length == 0) {
      fnameError.innerHTML = 'First Name is Required';
      return false;
   }
   if (!fname.match(/^[A-Za-z\\. ]+$/)) {
      fnameError.innerHTML = 'Enter valid First Name';
      return false;
   }
   fnameError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}
function validateLName() {
   var lname = document.getElementById('l_name').value;

   if (lname.length == 0) {
      lnameError.innerHTML = 'Last Name is Required';
      return false;
   }
   if (!lname.match(/^[A-Za-z ]+$/)) {
      lnameError.innerHTML = 'Enter valid Last Name';
      return false;
   }
   lnameError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateFather() {
   var father_name = document.getElementById('father_name').value;

   if (father_name.length == 0) {
      fatherError.innerHTML = "Father Name is Required";
      return false;
   }
   if (!father_name.match(/^[A-Za-z\\. ]+$/)) {
      fatherError.innerHTML = 'Enter valid Father Name';
      return false;
   }
   fatherError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateMother() {
   var mother_name = document.getElementById('mother_name').value;

   if (mother_name.length == 0) {
      motherError.innerHTML = "Mother Name is Required";
      return false;
   }
   if (!mother_name.match(/^[A-Za-z\\. ]+$/)) {
      motherError.innerHTML = 'Enter valid Mother Name';
      return false;
   }
   motherError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateEmail() {
   var email = document.getElementById('input_email').value;

   if (email.length == 0) {
      emailError.innerHTML = 'Email is Required';
      return false;
   }
   if (!email.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/)) {
      emailError.innerHTML = 'Enter valid Email Address';
      return false;
   }
   emailError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validatePhone() {
   var phone = document.getElementById('input_phone').value;

   if (phone.length == 0) {
      phoneError.innerHTML = 'Phone Number is Required';
      return false;
   }
   if (!phone.match(/^\+?([0-9]{1,3})\)?[-. ]?([0-9]{2})[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/)) {
      phoneError.innerHTML = 'Enter valid Phone Numbers';
      return false;
   }
   phoneError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateSPresentAddress() {
   var present_address = document.getElementById('present_address').value;

   if (present_address.length == 0) {
      presentaddressError.innerHTML = 'Present Address is Required';
      return false;
   }
   if (!present_address.match(/[A-Za-z0-9\-\\,.]+/)) {
      presentaddressError.innerHTML = 'Enter valid Present Address';
      return false;
   }
   presentaddressError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validatePermanentAddress() {
   var permanent_address = document.getElementById('permanent_address').value;

   if (permanent_address.length == 0) {
      permanentaddressError.innerHTML = 'Permanent Address is Required';
      return false;
   }
   if (!permanent_address.match(/[A-Za-z0-9-,.]+/)) {
      permanentaddressError.innerHTML = 'Enter valid Permanent Address';
      return false;
   }
   permanentaddressError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateDOF() {
   var date_of_birth = document.getElementById('dof').value;

   if (date_of_birth.length == 0) {
      dofError.innerHTML = 'Date of Birth is Required';
      return false;
   }
   if (!date_of_birth.match(/^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/)) {
      dofError.innerHTML = 'Enter valid Date of Birth';
      return false;
   }
   dofError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateNationality() {
   var nationality = document.getElementById('nationality').value;

   if (nationality.length == 0) {
      nationalityError.innerHTML = 'Nationality is Required';
      return false;
   }
   if (!nationality.match(/^[A-Za-z]+$/)) {
      nationalityError.innerHTML = 'Enter valid Nationality';
      return false;
   }
   nationalityError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateNationalid() {
   var nationalid = document.getElementById('nationalid').value;

   if (nationalid.length == 0) {
      nationalid_error.innerHTML = 'National ID is Required';
      return false;
   }
   if (!nationalid.match(/^([0-9]{12,17})$/)) {
      nationalid_error.innerHTML = 'Enter valid National ID';
      return false;
   }
   nationalid_error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateBank() {
   var bank = document.getElementById('bank').value;

   if (bank.length == 0) {
      bankError.innerHTML = 'Bank Name is Required';
      return false;
   }
   if (!bank.match(/^[A-Za-z.() ]+$/)) {
      bankError.innerHTML = 'Enter valid Bank Name';
      return false;
   }
   bankError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateBankAC() {
   var bank_ac = document.getElementById('bank_ac').value;

   if (bank_ac.length == 0) {
      bankacError.innerHTML = 'Bank Account No is Required';
      return false;
   }
   if (!bank_ac.match(/^([0-9]{12,17})$/)) {
      bankacError.innerHTML = 'Enter valid Bank Account No';
      return false;
   }
   bankacError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateImage() {
   var image = document.getElementById('image').value;

   if (image.length == 0) {
      imageError.innerHTML = 'Image is Required';
      return false;
   }
   imageError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateCV() {
   var cv = document.getElementById('cv').value;

   if (cv.length == 0) {
      cvError.innerHTML = 'CV is Required';
      return false;
   }
   cvError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validatePassword() {
   var password = document.getElementById('password').value;

   if (password.length == 0) {
      passwordError.innerHTML = 'Password is Required';
      return false;
   }
   if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(\W|_)).{8,24}$/)) {
      passwordError.innerHTML = 'Enter valid Password';
      return false;
   }
   passwordError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateRePassword() {
   var password = document.getElementById('password').value;
   var repassword = document.getElementById('repassword').value;

   if (repassword.length == 0) {
      repasswordError.innerHTML = 'Re-Password is Required';
      return false;
   }
   if (repassword != password) {
      repasswordError.innerHTML = 'Re-Password Not Match';
      return false;
   }
   repasswordError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateCheckbox() {
   var checkbox = document.getElementById('gridCheck').value;

   if (checkbox.length == 0) {
      checkboxError.innerHTML = 'Checkbox mark Required';
      return false;
   }
   checkboxError.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
   return true;
}

function validateForm() {
   if (!validateName() || !validateUsername() || !validateEmail() || !validatePhone() || !validateCountry() || !validateDistrict() || !validateZipCode() || !validateStreetAddress() || !validateDateOfBirth() || !validateUsername() || !validateProgram() || !validateSection() || !validateSubject() || !validateLastInstitute() || !validatePassyear() || !validateResult() || !validateAmount() || !validateImage() || !validateCv() || !validateAudio() || !validateVideo() || !validateWebsite() || !validatePassword() || !validateRepassword() || !validateCheckbox()) {
      submitError.style.display = 'block';
      submitError.innerHTML = 'Please Fix Input Fild than submit';
      setTimeout (function(){submitError.style.display = 'none';}, 3000);
      return false;
   }
}