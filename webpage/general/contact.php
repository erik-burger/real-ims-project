 <div class = "page">        
      <div class = "column left">
        <h1>Contact Information</h1> 

        <div class = "container">
        
        <p><b>email:</b> trackzheimers@gmail.com</p>
        <p><b>telephone:</b> 123456789</p>
        <p><b>adress:</b> project room ITC</p>
        </div>
        </div>
    
    <div class = "column right" id = "message_form">
        <h1>Write Us a Message</h1>
        <div class = "container">
        <div class = "form">
        <form action="send_email.php" method = "post" id = "message_form" name = "message_form">
            <label for="email"><b>Email address</b></label>
            <input name="email" class = "email" type="text" placeholder="Enter your email address" required><br>  
            <label for="subject"><b>Subject</b></label>
            <input name="subject" class = "email" type="text" placeholder="Enter subject" required><br>  
            <label for="message"><b>Message</b></label>
            <textarea name="message" id = "message" cols=auto rows=auto placeholder="Enter message here..."></textarea>
            <button class = "button" type = "submit" name = "submit">Send</button>
        </form>  
        </div>
        </div>
     </div>     
    </div>
 </div> 
</html>


