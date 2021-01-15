<div id="container">
    <div class="inner-wrap">
        <div class="table-sec">
            <h2>Edit Dropdown API</h2>
            
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <tbody>
                    <tr>
                        <td>
                            <?php echo form_open(base_url().'edit-new-api/'.$api_id,'id="addform" 
								class="full validate add_task_form " enctype="multipart/form-data"'); ?>
                            
                            <div class="row">
                                <label for="d1_textfield">
                                    <strong>API Title</strong>
                                </label>
                                <div>
                                    <input class="required" type="text" name="api_title" 
										id="api_title" value="<?php echo $api_title; ?>"/>
                                    <span id='availability_status'></span>
                                </div>
                            </div>
                            <div class="row">
                            <?php
                            if($department_id==0){
                                ?>
                                <div class="row">
                                    <label for="d1_textfield">
                                        <strong>Department</strong>
                                    </label>
                                    <div>
                                        <select name="department_id">
                                            <?php
                                            foreach($departments as $key=>$val){
                                                ?>
                                                <option <?php if($saved_department_id==$val['id']){ echo "selected"; }  ?> 
												value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id='availability_status'></span>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            </div>
                            <div class="row">
                                <label for="d1_textfield">
                                    <strong>API File (.csv only)</strong>
                                </label>
                                <div>
                                    <input type="file" name="userfile_addapi" id="userfile_addapi" 
										accept="*.csv" onchange="check_file()"/>
                                </div>
                            </div>
                            <div class="actions">
                                <div class="right">
                                    <button class="genericBtn" id="addappbtn">Update API</button>
                                </div>

                            </div>

                            <?php echo form_close(); ?>
                        </td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        $("#addform").validate({
                rules: {
                    api_title: "required",
                    
                    
                },
                messages: {
                    api_title : "API Title is required",
                }
            });
    });
   

    function check_file() {
        str = document.getElementById('userfile_addapi').value.toUpperCase();
        suffix = ".csv";
        suffix2 = ".CSV";
        if (!(str.indexOf(suffix, str.length - suffix.length) !== -1 ||
                str.indexOf(suffix2, str.length - suffix2.length) !== -1)) {
            alert('File type not supported, only (.CSV) files allowed.');
            document.getElementById('userfile_addapi').value = '';
        }
    }
</script>
<style>
    .error p{
        color: red;
        font-weight: bold;
    }
    #availability_status {
        color: green;
    }
</style>