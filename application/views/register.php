<?php
/**
 * @author Niklas Ewes
 */
if(isset($_SESSION)) {
    echo $this->session->flashdata('flash_data');
} ?>

<div class="row">
    <div id="form" class="collapse">
        <form action="<?php site_url('register') ?>" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-1 control-label">Username:</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="username" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Password:</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="password" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-12">
                    <button type="submit" type="button" class="btn btn-default">Register</button>
            </div>
            </div>
        </form>
    </div>
</div>