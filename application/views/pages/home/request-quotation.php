<div class="request-quotation">
    <div class="description">
        <div class="header">
            We are ready to satisfy
            your project requirements
        </div>
        <div class="sub-header">
            We are committed to satisfy our clients’ needs by honoring our pledge to provide
            Quality and Timely Professional Electro-Mechanical Services and Reliable Workmanship at reasonable prices,
            thereby ensuring a sustainable enterprise for the clients, company shareholders and employees.
        </div>
    </div>
    <div class="form">
        <div id="requestForm" class="ui form">
            <div class="message"></div>

            <form action="" id="requestQuotation">
                <div class="header">Request for Quotation</div>
                <div class="field">
                    <label class="required" for="Name">Your Name</label>
                    <input id="Name" name="Name" type="text" value="">
                </div>
                <div class="field">
                    <label class="required" for="Email">Your Email</label>
                    <input id="Email" name="Email" type="text" value="">
                </div>
                <div class="field">
                    <label class="required" for="Phone">Your Phone Number</label>
                    <input id="Phone" name="Phone" type="text" value="">
                </div>
                <div class="field">
                    <label class="required" for="Subject">Subject</label>
                    <input id="Subject" name="Subject" type="text" value="">
                </div>
                <div class="field">
                    <label class="required" for="Message">Your Message</label>
                    <textarea cols="20" id="Message" name="Message" rows="8"></textarea>
                </div>
                <div class="field">
                    <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
                </div>
                <input id="MessageType" name="MessageType" type="hidden" value="Quotation">
                <div><font style="color:red;">*</font> indicates required field</div>
            </form>
            <button id="btnSendRequest" type="button" class="submit">SEND REQUEST</button>
        </div>
    </div>
</div>