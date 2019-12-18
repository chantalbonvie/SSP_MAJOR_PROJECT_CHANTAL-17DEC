<?php

require_once("header.php");

require_once($_SERVER["DOCUMENT_ROOT"]. "/conn.php");


$errors = [];


?>


<div class="container">
    <div class="signup">
        <div class="row">

            <div class="col-12">
                <h1>Become a Member</h1>
            </div>

            <form action="/actions/login.php" class="col-12" method="post">
                <?php
        include($_SERVER["DOCUMENT_ROOT"]. "/includes/error_check.php");
        ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password2">Confirm Password</label>
                        <input type="password" class="form-control" id="password2" name="password2"
                            placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="province_state">Province or State</label>
                        <input type="text" class="form-control" id="province_state" name="province_state"
                            placeholder="Province or State">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputZip">Postal Code</label>
                        <input type="text" class="form-control" name="postal_code" id="postal_code"
                            placeholder="Postal Code">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <div class="form-check">
                            <label for="signup">Sign-up for Newsletter?
                            </label><br>
                            <input class="form-check-input" type="radio" name="newsletter" id="newsletter_yes"
                                value="true" checked>
                            <label class="form-check-label" for="newsletter_no">Yes
                            </label>
                            <!--<div class="form-check">-->
                            <br>
                            <input class="form-check-input" type="radio" name="newsletter" id="newsletter_no"
                                value="false">
                            <label class="form-check-label" for="newsletter_no">No
                            </label>
                        </div>
                </div>
 
         <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="member">Please check one:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="member" value="2" checked>
                            <label class="form-check-label" for="member">Member
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="role" id="non_member" value="3">
                            <label class="form-check-label" for="non_member">Non-Member
                            </label>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-12">
            <button type="submit" name="action" value="signup" id="submitinfo">
                Submit and Sign in</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
require_once("footer.php");
?>