function Contactame(){
    const form = useRef("form");

    const sendEmail = (e) => {
        const validateEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/ 
        const nameValue = document.querySelector("name").value
        const emailValue = document.querySelector("email").value
        const textAreaValue = document.querySelector("message").value
        e.preventDefault();
        if(nameValue === ""  || textAreaValue === ""){
            swet({
                icon: "error",
                title: "You must fill in all the fields",
                button: "Accept"
            })
        } else if ( !validateEmail.test(emailValue)){
            swet({
                icon: "error",
                title: "Invalid Email",
                button: "Accept"
            })
        } else {
            emailjs.sendForm('service_ya43oes', 'template_dwkg35g', form.current, 'F4W3EOTn9sBL3851q')
            .then((result) => {
                const reload = () =>{
                    window.location.reload()
                }
                swet({
                    icon: "success",
                    title: "Sent",
                })
                setInterval( reload, 2000)
            }, (error) => {
                console.log(error.text);
            });
        }
    }

            

    return(
        <>
            <div className="formContainer">
                <div className="headerFormContainer-pc">
                        <label className="headerForm-pc">Let's Talk:</label>
                    </div>
                <form ref={form} onSubmit={sendEmail} className='form'>
                    <div className="headerFormContainer">
                        <label className="headerForm">Let's Talk:</label>
                    </div>
                    <label className="labelName">Full Name:</label>
                    <input id="name" type="text" name="user_name" autoComplete='off'/>
                    <label className="labelEmail" >Your Email:</label>
                    <input id="email" type="email" name="user_email" autoComplete='off'/>
                    <label className="labelMessage">Your interests are important, write your message:</label>
                    <textarea id="message" name="message"></textarea>
                    <div className="bSubmitContainer">
                        <input className="iSubmit" type="submit" value="Send" />
                    </div>
                </form>
            </div>
        </>
    )
}
export {Contactame}