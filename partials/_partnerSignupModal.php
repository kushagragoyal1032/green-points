<!-- signup Modal -->


<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Please enter some details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="partials/_partnerhandlesignup.php">  
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signup_partner_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="signup_partner_name" name="partner_name"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup_partner_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signup_partner_email" name="partner_email"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup_partner_phone" class="form-label">Phone No</label>
                        <input type="text" class="form-control" id="signup_partner_phone" name="partner_phone"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup_partner_ngo" class="form-label">NGO Name</label>
                        <input type="text" class="form-control" id="signup_partner_ngo" name="partner_ngo"
                            aria-describedby="emailHelp" required>
                    </div>
                   
                    <div class="mb-3">
                        <label for="signup_partner_pass1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="partner_pass" id="signup_partner_pass1"
                            required>
                        <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="signup_partner_pass2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signup_partner_pass2" name="partner_cpass"
                            aria-describedby="emailHelp" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="sign-up">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>