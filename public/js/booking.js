Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
function x(){
    function removeError(){
        const error=document.querySelector('.error_booking');
        if(error){
            error.remove();
        }
    }
    let check = false;

    function booking(el) {
        try {
            check=false;
            const checkin = document.querySelector(".checkin_date_input");
            const checkout = document.querySelector(".checkout_date_input");


            const timeElapsed = Date.now();

            const today = new Date(timeElapsed);

            const currentDate = today.toISOString().slice(0, 10);
            const error=document.querySelector('.error_booking');

            if(el===checkin){
                if(checkin.value=="")throw new Error("Checkin should not be empty");
               else removeError();
                if (currentDate > checkin.value)throw new Error("You have passed a wrong checkin date");
               else  removeError();


            }
            if(el===checkout){
                if(checkout.value=="")throw new Error("Checkout should not be empty");
                else removeError();
                if(checkin!=="" && checkin.value>checkout.value)throw new Error("Checkout date is wrong it should be after checkin");
               else  removeError();

            }
            check=true;



        } catch (err) {
            const error=document.querySelector('.error_booking');
            if(!error){
            const markup = `<div class="text-danger error_booking font-weight-bold w-100 text-center" style="opacity: 1;transition: opacity 1s ease-in">${err.message}</div>`;
            bookingForm.insertAdjacentHTML("beforeend", markup);
            }
        }
    }


    const bookingForm = document.querySelector(".booking-form");
    if (bookingForm) {
        const checkin = document.querySelector(".checkin_date_input");
        const checkout = document.querySelector(".checkout_date_input");
        const checkBtn = document.querySelector(".check_room_btn");
        checkin.value=new Date().toDateInputValue();
        checkin.addEventListener("input", () => {
            booking(checkin);

        });
        checkout.addEventListener("input", () => {
            booking(checkout);

        });
        checkBtn.addEventListener('click',(e)=>{
            function submitForm(form) {
                var submitFormFunction = Object.getPrototypeOf(form).submit;
                submitFormFunction.call(form);
            }
            booking(checkin);
            booking(checkout);
            if(!check){
                e.preventDefault()

            }
            else{
                submitForm(bookingForm);
            }

        })
    }

}
const checkin = document.querySelector(".checkin_date_input");
        const checkout = document.querySelector(".checkout_date_input");
        const checkBtn = document.querySelector(".check_room_btn");
if(checkin && checkout && checkBtn){
    x();
}
