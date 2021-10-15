<?php
/**
 * Plugin Name: XPD Payment Form
 * Plugin URI: https://adeleyeayodeji.com/
 * Author: Adeleye Ayodeji
 * Author URI: https://adeleyeayodeji.com/
 * Description: Enable booking payment via woocommerce
 * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: xpd-payment
*/
if (!defined('ABSPATH')) {
  die('-1');
}

class XPDPAYMENT 
{
    public static function xdpstyles()
    {
        ?>
<style>
#xpd_div label {
    width: 100% !important;
    margin-top: 10px !important;
    margin-bottom: 7px !important;
}

#xpd_div label>span {
    color: red;
}

#xpd_div input {
    width: 100% !important;
    border: 2px solid #313554 !important;
    color: #313554 !important;
}

#xpd_div .input {
    width: 100% !important;
    padding: 1px !important;
}

#xpd_div select {
    width: 100% !important;
    border: 2px solid #313554 !important;
    color: #313554 !important;
}

#xpd_div .select {
    width: 100% !important;
    padding: 1px !important;
}

#xpd_div [type=button]:focus,
#xpd_div [type=button]:hover,
#xpd_div [type=submit]:focus,
#xpd_div [type=submit]:hover,
#xpd_div button:focus,
#xpd_div button:hover {
    color: #fff;
    background-color: #61aef7;
    text-decoration: none;
}

#xpd_div [type=button],
#xpd_div [type=submit],
#xpd_div button {
    display: inline-block;
    font-weight: 400;
    color: #2c93f4;
    text-align: center;
    white-space: nowrap;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid #2c93f4;
    padding: .5rem 1rem;
    font-size: 1rem;
    border-radius: 3px;
    -webkit-transition: all .3s;
    -o-transition: all .3s;
    transition: all .3s;
}
</style>
<?php
    }
    public static function shortcode()
    {
        ob_start();
        self::xdpstyles();
        ?>
<style>
/* section[data-settings='{"background_background":"classic"}'] {
    background-color: #4055B2 !important;
    padding: 100px !important;
}

section[data-settings='{"background_background":"classic"}'] img {
    height: 200px !important;
    width: auto !important;
} */
</style>
<div id='xpd_div'>
    <div style="text-align:center;display:none;" id="loader">
        <h4>Verifying Transaction, please wait...</h4>
        <img src="<?php echo plugin_dir_url(__FILE__) ?>/assets/img/loading-waiting.gif" alt="" style='height: 50px;'>
    </div>
    <form enctype="multipart/form-data" action="" id="xdp-form">
        <div class="span12 unit">
            <label class="label">Full Name <span>*</span></label>
            <div class="input">
                <input type="text" name="fname" placeholder="First &amp; Last Name" value="" required="">
            </div>
        </div>
        <div class="span12 unit">
            <label class="label">Email <span>*</span></label>
            <div class="input">
                <input type="email" name="pemail" placeholder="Enter Email Address" id="email" value="admin@xpd.ng"
                    required="">
            </div>
        </div>
        <hr style="    margin-top: 0px;
    margin-bottom: 10px;">
        <div class="span12 unit">
            <label class="label">Phone Number <span>*</span></label>
            <div class="input">
                <input type="text" name="Phone Number" placeholder="Enter Phone Number" required="required">
            </div>
        </div>
        <div class=" span12 unit">
            <label class="label">Address <span>*</span></label>
            <div class="input">
                <textarea name="Address" id="" placeholder="Enter Address" required="required" cols="30"
                    rows="6"></textarea>
            </div>
        </div>


        <hr style="    margin-top: 10px;
    margin-bottom: 0px;">
        <div class="span12 unit" style="display: block;">
            <div style="text-align: center;width:100%;">
                <h4>ENTER ITEM DETAILS BELOW</h4>
            </div>
        </div>
        <hr style="    margin-top: 0px;
    margin-bottom: 10px;">

        <div class=" span12 unit">
            <label class="label">Name of Item <span>*</span></label>
            <div class="input">
                <input type="text" name="Name of Item" placeholder="Enter Name of Item" required="required">
            </div>
        </div>
        <div class=" span12 unit">
            <label class="label">Item Description <span>*</span></label>
            <div class="input">
                <textarea name="Description" id="" placeholder="Enter Item Description" required="required" cols="30"
                    rows="6"></textarea>
            </div>
        </div>
        <div class="elementor-row">
            <div class="elementor-element elementor-column elementor-col-100">
                <div class="input" style="width: 100%;">
                    <label class="label">Amount (NGN 880) <span>*</span></label> <br>
                    <input type="text" name="amount" value="880" id="amount" readonly="" required=""><span
                        id="min-val-warn" style="color: red; font-size: 13px;"></span>
                </div>
            </div>
            <div class="elementor-element elementor-column elementor-col-100">
                <div class="select" style="width: 100%;">
                    <label class="label">Quantity</label> <br>
                    <select class="form-control" name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                        <option value="71">71</option>
                        <option value="72">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                        <option value="76">76</option>
                        <option value="77">77</option>
                        <option value="78">78</option>
                        <option value="79">79</option>
                        <option value="80">80</option>
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                        <option value="84">84</option>
                        <option value="85">85</option>
                        <option value="86">86</option>
                        <option value="87">87</option>
                        <option value="88">88</option>
                        <option value="89">89</option>
                        <option value="90">90</option>
                        <option value="91">91</option>
                        <option value="92">92</option>
                        <option value="93">93</option>
                        <option value="94">94</option>
                        <option value="95">95</option>
                        <option value="96">96</option>
                        <option value="97">97</option>
                        <option value="98">98</option>
                        <option value="99">99</option>
                        <option value="100">100</option>
                    </select>
                    <i></i>
                </div>
            </div>

        </div>
        <hr style="    margin-top: 10px;
    margin-bottom: 0px;">
        <div class="span12 unit" style="display: flex;width:100%;">
            <div style="width:100%;">
                <h4>Total::</h4>
            </div>
            <div style="text-align: right;width:100%;">
                <h4 id="xdp-total">₦<span>880</span></h4>
            </div>
        </div>

        <hr style=" margin-top: 10px; margin-bottom: 0px;">
        <div class="span12 unit" style="display: block;">
            <div style="text-align: center;width:100%;">
                <h4>ENTER RECEIVER'S DETAILS BELOW</h4>
            </div>
        </div>
        <hr style="    margin-top: 0px;
    margin-bottom: 10px;">
        <div class=" span12 unit">
            <label class="label">Receiver's Full Name <span>*</span></label>
            <div class="input">
                <input type="text" name="Receivers Full Name" placeholder="Enter Receiver's Full Name"
                    required="required">
            </div>
        </div>
        <div class=" span12 unit">
            <label class="label">Receiver's Email <span>*</span></label>
            <div class="input">
                <input type="text" name="Receivers Email" placeholder="Enter Receiver's Email" required="required">
            </div>
        </div>
        <div class=" span12 unit">
            <label class="label">Receiver's Phone Number <span>*</span></label>
            <div class="input">
                <input type="text" name="Receivers Phone Number" placeholder="Enter Receiver's Phone Number"
                    required="required">
            </div>
        </div>
        <div class=" span12 unit">
            <label class="label">Select One Of XPD Covered Zones in Lagos
                <span>*</span></label>
            <div class="input">
                <select class="form-control" name="Select One Of XPD Covered Zones in Lagos" required="required">
                    <option value="">- Select -</option>
                    <option value="Lagos Island">Lagos Island</option>
                    <option value="Victoria Island">Victoria Island</option>
                    <option value="Ikoyi">Ikoyi</option>
                    <option value="Lekki 1st Round About">Lekki 1st Round About</option>
                    <option value="Yaba">Yaba</option>
                    <option value="Surulere">Surulere</option>
                    <option value="Ikeja">Ikeja</option>"
                </select><i></i>
            </div>
        </div>
        <div class="span12 unit">
            <label class="label">Receiver's Address <span>*</span></label>
            <div class="input">
                <textarea type="text" name="Receivers Address" placeholder="Enter Receiver's Address" cols="30" rows="6"
                    required="required"></textarea>
            </div>
        </div>

        <div class="" style="display: flex;margin-top: 8px;">
            <div style="text-align: left;width:100%;">
                <button type="reset" class="primary-btn">Reset</button>
            </div>
            <div style="text-align: right;width:100%;">
                <button type="submit" class="secondary-btn">Book Delivery</button>
            </div>
        </div>
</div>
<input type="hidden" name="action" value="xdp_ajax">
<input type="hidden" name="xdp_amount" value="880">
<input type="hidden" name="xdp_ref">
</form>
<?php
    global $wpdb;
        $table = $wpdb->prefix ."xdb_settings";
        $resultd = $wpdb->get_results("SELECT * FROM $table");

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
function payWithPaystack(form) {
    let xdp_amount = $("input[name='xdp_amount']").val();
    let handler = PaystackPop.setup({
        key: '<?php echo  $resultd[0]->mode == "test" ? $resultd[0]->paystack_public_key : $resultd[0]->paystack_live_public_key ?>', // Replace with your public key
        email: $("input[name='pemail']").val(),
        amount: xdp_amount * 100,
        ref: '' + Math.floor((Math.random() * 1000000000) +
            1
        ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function() {
            alert('Window closed.');
        },
        callback: function(response) {
            let ref = response.reference;
            $("input[name='xdp_ref']").val(ref);
            //ajax
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                data: form.serialize(),
                beforeSend: () => {
                    console.log("Sending...");
                    form.fadeOut();
                    $(".wellload").fadeOut(() => {
                        $(".wellload").remove();
                    });
                    $("#loader").fadeIn();
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#loader").offset().top
                    });
                    $("button[type='submit']").text("Submitting order, please wait..");
                    form.find("input, button, textarea, select").prop("disabled", true);
                },
                success: function(response) {
                    if (response.code == 200) {
                        form.trigger("reset");
                        form.find("input, button, textarea, select").prop("disabled", false);
                        $("button[type='submit']").text("Book Delivery");
                        $("#loader").html(`
                             <h4 style="color:#25d366;">Transaction Verified!</h4>
                            <img src="<?php echo plugin_dir_url(__FILE__) ?>/assets/img/320-3203375_checked-icon-clipart-removebg-preview.png" alt="" style='height: 50px;'>
                            <p>Thank you for your order, Admin will contact you shortly.</p>
                            <p><a href="javascript:;" onclick="book_again()" class="secondary-btn">Book Again</a></p>
                        `);
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#loader").offset().top
                        });
                    } else {
                        form.find("input, button, textarea, select").prop("disabled", false);
                        $("button[type='submit']").text("Book Delivery");
                        form.prepend(`
                        <div class="wellload" style="color: red;
                            padding: 5px;
                            border: 1px solid red;
                            text-align: center;">
                            <p style="padding: 0px;
                            margin: 0px;">${response.info}</p>
                        </div>`);
                        book_again();
                        $([document.documentElement, document.body]).animate({
                            scrollTop: form.offset().top
                        });
                    }
                    console.log(response);
                }
            });
        }
    });
    handler.openIframe();
}

function book_again() {
    $("#loader").fadeOut(() => {
        $("#xdp-form").fadeIn();
    });
}

$(document).ready(function() {
    $("select[name='quantity']").change(function(e) {
        e.preventDefault();
        var amount = 880;
        var value = $(this).val();
        var total = amount * value;
        $("input[name='xdp_amount']").val(total);
        let formatedNumber = new Intl.NumberFormat().format(total)
        $("#xdp-total > span").text(formatedNumber);
    });

    $("#xdp-form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        payWithPaystack(form);
    });
});
</script>
</div>
<?php
        return ob_get_clean();
    }

    public static function xdp_ajax()
    {
        header("Content-Type: application/json");
        //Verify payment
        $result = self::xdp_verify_payment($_POST["xdp_ref"]);
        if($result->status && $result->data->status == "success"){
            global $wpdb;
            $table_name = $wpdb->prefix . 'xdb_orders';
            unset($_POST['action']);
            unset($_POST['xdp_amount']);
            $query = $wpdb->insert(
                    $table_name, //Table name
                    $_POST, //Data to pass
                    $format=NULL
                );
            if($query){
                if($_SERVER["SERVER_ADDR"] != '127.0.0.1'){
                    $table = $wpdb->prefix ."xdb_settings";
                   $resultd = $wpdb->get_results("SELECT * FROM $table");
                   $emails_ = str_replace("\n","",str_replace(" ","",$resultd[0]->emails));
                   $emails = explode(",",$emails_);
                   foreach ($emails as $key => $to) {
                       $subject = 'New Booking from '.$_POST["fname"];
                       $postdata = "";
                       foreach ($_POST as $key => $value) {
                           $postdata .= "<tr>
   <td class='element-style'>".str_replace('_',' ', str_replace('fname', 'Full Name',str_replace('pemail', 'Email', $key)))."</td>
   <td><span class='success true'>".$value."</span></td>
   </tr>";
                       }
                       $body = "
                        <style>
                  table {
                font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2
            }
            tr:hover {background-color: #ddd;}
 thead {
  padding-top: 12px;
  padding-bottom: 12px;
  font-weight: 700;
  text-align: left;
  background-color: purple;
  color: white;
}
            </style>
            <div style='overflow-x:auto;'>
                           <table class='forms' style='width: 100%;' width='100%' cellspacing='0' cellpadding='0'>
   <thead>
   <tr class='header'>
   <td class='element-header' width='30%'>Heading</td>
   <td class='client' width='20%'>Details</td>
   </tr>
   </thead>
   <tbody>
   ".$postdata."
   </tbody>
   </table></div>
   <p>
    Goto dashboard <a href='".home_url( '/bookings/' )."'>".home_url( '/bookings/' )."</a>
   </p>
                       ";
                       $headers = array('Content-Type: text/html; charset=UTF-8');
                       wp_mail( $to, $subject, $body, $headers );
                   }
                }
                echo wp_json_encode(["code" => 200, "info" => "Order submitted"]);
            }else{
                echo wp_json_encode(["code" => 401, "info" => $wpdb->last_error ]);
            }
        }else{
            echo wp_json_encode(["code" => 401, "info" => "Unable to verify payment [".$result->message."]"]);
        }
    die();
    }

    public static function xdp_verify_payment($ref = null)
    {
        global $wpdb;
        $table = $wpdb->prefix ."xdb_settings";
        $resultd = $wpdb->get_results("SELECT * FROM $table");
        $sk_key = $resultd[0]->mode == "test" ? $resultd[0]->paystack_secret_key : $resultd[0]->paystack_live_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $sk_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
       return json_decode($response);
    }

    public static function create_xdb_db()
    {
        global $table_prefix, $wpdb;

        $xdb_table = $table_prefix . 'xdb_orders';
        $xdb_settings = $table_prefix . 'xdb_settings';
        #Check to see if the table exists already, if not, then create it
        if($wpdb->get_var( "show tables like '$xdb_table'" ) != $xdb_table) 
        {
            $sql = "CREATE TABLE `". $xdb_table . "` ( ";
            $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
            $sql .= "  `Address`  text NOT NULL, ";
            $sql .= "  `Description`  text NOT NULL, ";
            $sql .= "  `Name_of_Item`  varchar(1000) NOT NULL, ";
            $sql .= "  `Phone_Number`  varchar(1000) NOT NULL, ";
            $sql .= "  `Receivers_Address`  varchar(1000) NOT NULL, ";
            $sql .= "  `Receivers_Email`  varchar(1000) NOT NULL, ";
            $sql .= "  `Receivers_Full_Name`  varchar(1000) NOT NULL, ";
            $sql .= "  `Receivers_Phone_Number`  varchar(1000) NOT NULL, ";
            $sql .= "  `Select_One_Of_XPD_Covered_Zones_in_Lagos`  varchar(1000) NOT NULL, ";
            $sql .= "  `amount`  varchar(1000) NOT NULL, ";
            $sql .= "  `fname`  varchar(1000) NOT NULL, ";
            $sql .= "  `pemail`  varchar(1000) NOT NULL, ";
            $sql .= "  `quantity`  varchar(1000) NOT NULL, ";
            $sql .= "  `xdp_ref`  varchar(1000) NOT NULL, ";
            $sql .= "  `status`  varchar(1000) NOT NULL DEFAULT 'booked', ";
            $sql .= "  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
            $sql .= "  PRIMARY KEY `order_id` (`id`) "; 
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
       
        if($wpdb->get_var( "show tables like '$xdb_settings'" ) != $xdb_settings) 
        {
            $sql = "CREATE TABLE `". $xdb_settings . "` ( ";
            $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
            $sql .= "  `emails`  text NOT NULL, ";
            $sql .= "  `paystack_public_key`  varchar(1000) NOT NULL, ";
            $sql .= "  `paystack_secret_key`  varchar(1000) NOT NULL, ";
            $sql .= "  `paystack_live_public_key`  varchar(1000) NOT NULL, ";
            $sql .= "  `paystack_live_secret_key`  varchar(1000) NOT NULL, ";
            $sql .= "  `mode`  varchar(1000) NOT NULL, ";
            $sql .= "  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
            $sql .= "  PRIMARY KEY `order_id` (`id`) "; 
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }

        $query = $wpdb->insert(
            $xdb_settings, //Table name
            [
                "emails" => "xpeditepd@gmail.com, operations@xpd.ng",
                "paystack_public_key" => "pk_test_430590cc9943a7bd31543e8568e0850d2dc64d34",
                "paystack_secret_key" => "sk_test_3d9c02a195fb1ddcfec2c572ed84f9dfb67930ee",
                "paystack_live_public_key" => "",
                "paystack_live_secret_key" => "",
                "mode" => "test",

            ], //Data to pass
            $format=NULL
        );
    }

    public static function xdb_db_table() {
        global $wpdb;
        $xdb_orders = $wpdb->prefix . "xdb_orders";
        $xdb_settings = $wpdb->prefix . "xdb_settings";
        $sql = "DROP TABLE IF EXISTS $xdb_settings;";
        $wpdb->query($sql);
        $sql2 = "DROP TABLE IF EXISTS $xdb_orders;";
        $wpdb->query($sql2);
        //Delete plugin db version
        delete_option("my_plugin_db_version");
    }

    public static function xpd_page_link( $links ) {
      $links[] = '<a href="' .
        admin_url( 'admin.php?page=xpd-payment' ) .
        '">' . __('Go to Admin Panel') . '</a>';
      return $links;
    }

    public static function xpd_admin_page()
    {
        global $wpdb; //Access WP DB
        $table_name = $wpdb->prefix . 'xdb_orders'; //table name
        $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY timestamp DESC");
    ?>
<h1 class="wp-heading-inline">
    Recent Orders
</h1>
<a href="<?php echo admin_url( 'admin.php?page=xpd-payment' ); ?>" class="button-primary">
    Go Back </a>
<hr class="wp-header-end">
<style>
.postbox-container {
    width: auto !important;
}

.inside {
    /* width: max-content; */
}

.inside .error,
.inside .notice {
    display: none;
}
</style>
<div id="dashboard-widgets-wrap">
    <div id="dashboard-widgets" class="metabox-holder">
        <!-- Page 1 -->
        <div id="postbox-container-2" class="postbox-container">
            <?php
                if(isset($_GET["view"]) && !empty($_GET["view"])){
                        $table_name_single = $wpdb->prefix . 'xdb_orders'; //table name
                        $id = $_GET["view"];
                        $resultw = $wpdb->get_results("SELECT * FROM $table_name_single where id = '$id'");

                        //Update
                        if(isset($_POST["update_xdp_d"])){
                            $query = $wpdb->update(
                                $table_name_single,
                                ["status" => $_POST["status"]],
                                ["id" => $id],
                                $format=NULL
                            );
                             if ($query == 1) {
                                echo "<div id='message' class='updated notice is-dismissible'><p>Payment Settings Updated. <br><br><a href='".$_SERVER['REQUEST_URI']."' class='button button-primary'>Refresh Page</a></p><button type='button' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>";
                            }else{
                                echo "<div id='message' class='error notice is-dismissible'><p>".$wpdb->last_error."</p><button type='button' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>";
                            }
                        }
                    ?>
            <form action="" method="post">
                <input type="hidden" name="update_xdp_d">
                <h3 style="margin-left: 0px;">Current Status: <?php echo ucfirst($resultw[0]->status); ?></h3>
                <select name="status" id="">
                    <option value="booked">Booked</option>
                    <option value="completed">Completed</option>
                </select>
                <button class="button-primary">Update Status</button>
            </form>
            <hr>
            <style>
            table {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2
            }

            tr:hover {
                background-color: #ddd;
            }

            thead {
                padding-top: 12px;
                padding-bottom: 12px;
                font-weight: 700;
                text-align: left;
                background-color: purple;
                color: white;
            }
            </style>
            <div style="overflow-x:auto;">
                <table class="forms" style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                    <thead style="
    font-size: 20px;
">
                        <tr class="header">
                            <td class="element-header" width="30%">Heading</td>
                            <td class="client" width="20%">Details</td>
                        </tr>
                    </thead>
                    <tbody style="
    font-size: 15px;
">
                        <tr>
                            <td class="element-style">Address</td>
                            <td><span class="success true"><?php echo $resultw[0]->Address ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Description</td>
                            <td><span class="success true"><?php echo $resultw[0]->Description ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Name of Item</td>
                            <td><span class="success true"><?php echo $resultw[0]->Name_of_Item ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Phone Number</td>
                            <td><span class="success true"><?php echo $resultw[0]->Phone_Number ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Receivers Address</td>
                            <td><span class="success true"><?php echo $resultw[0]->Receivers_Address ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Receivers Email</td>
                            <td><span class="success true"><?php echo $resultw[0]->Receivers_Email ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Receivers Full Name</td>
                            <td><span class="success true"><?php echo $resultw[0]->Receivers_Full_Name ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Receivers Phone Number</td>
                            <td><span class="success true"><?php echo $resultw[0]->Receivers_Phone_Number ?></span></td>
                        </tr>
                        <tr>
                            <td class="element-style">Select One Of XPD Covered Zones in Lagos</td>
                            <td><span
                                    class="success true"><?php echo $resultw[0]->Select_One_Of_XPD_Covered_Zones_in_Lagos ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="element-style">Amount</td>
                            <td><span class="success true"><?php echo $resultw[0]->amount ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="element-style">Full Name</td>
                            <td><span class="success true"><?php echo $resultw[0]->fname ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="element-style">Email</td>
                            <td><span class="success true"><?php echo $resultw[0]->pemail ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="element-style">Quantity</td>
                            <td><span class="success true"><?php echo $resultw[0]->quantity ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="element-style">Transaction Reference</td>
                            <td><span class="success true"><?php echo $resultw[0]->xdp_ref ?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
                }else{
                    if(isset($_GET["delete"]) && !empty($_GET["delete"])){
                        global $wpdb;
                        $id = $_GET["delete"];
                        $table_name_single = $wpdb->prefix . 'xdb_orders'; 
                        $query = $wpdb->delete($table_name_single, ["id" => $id]);
                        if($query == 1){
                            echo "<script>window.alert('Data Deleted')</script>";
                            echo "<script>window.location.href='".admin_url( 'admin.php?page=xpd-payment' )."'</script>";
                        }else{
                            echo "<script>window.alert('".$wpdb->last_error."')</script>";
                            echo "<script>window.location.href='".admin_url( 'admin.php?page=xpd-payment' )."'</script>";
                        }
                    }
                    ?>
            <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                <div id="table-data" class="postbox" style="width: min-content;border: none;background: transparent;">
                    <div class="inside">
                        <h3 class="wp-heading-inline">
                            Recent Orders</h3>
                        <hr class="wp-header-end">
                        <ul class="subsubsub">
                            <li class="all"><a href="edit.php?post_type=post" class="current" aria-current="page">All
                                    <span class="count">(<?php echo count($results); ?>)</span></a>
                            </li>
                        </ul>

                        <!-- <p class="search-box">
                <label class="screen-reader-text" for="post-search-input">Search Orders:</label>
                <input type="search" id="post-search-input" name="s" value="">
                <input type="submit" id="search-submit" class="button" value="Search Posts">
            </p> -->
                        <table class="wp-list-table widefat fixed striped table-view-list posts" style="width: 800px;">
                            <thead>
                                <tr>

                                    <th scope="col" id="title"
                                        class="manage-column column-title column-primary sortable desc"
                                        style="width: 12%;">
                                        <span>Receivers Full Name</span>
                                    </th>
                                    <th scope="col" id="categories" class="manage-column column-categories">Name of Item
                                    </th>
                                    <th scope="col" id="categories" class="manage-column column-categories">Status
                                    </th>
                                    <th scope="col" id="date" class="manage-column column-date sortable asc">
                                        <span>Date</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody id="the-list">
                                <?php
                //log
                if(count($results) < 1){
                ?>
                                <tr>
                                    <th scope="row" class="check-column">
                                        <div class="locked-indicator">

                                        </div>
                                    </th>
                                    <td>
                                        <h4>No Data to display</h4>
                                    </td>
                                </tr>
                                <?php
                }else{
                    foreach ($results as $result) {
                        ?>
                                <tr id=""
                                    class="iedit author-self level-0  type-post status-draft format-standard hentry category-uncategorized">

                                    <td class="title column-title has-row-actions column-primary page-title"
                                        data-colname="Title">
                                        <div class="locked-info"><span class="locked-avatar"></span> <span
                                                class="locked-text"></span>
                                        </div>
                                        <strong><a class="row-title"
                                                href="<?php echo admin_url( 'admin.php?page=xpd-payment&view=' ).$result->id ?>"
                                                aria-label="“Well” (View)"><?php echo $result->Receivers_Full_Name ?></a>
                                        </strong>
                                        <div class="row-actions">
                                            <span class="view">
                                                <a href="<?php echo admin_url( 'admin.php?page=xpd-payment&view=' ).$result->id ?>"
                                                    rel="bookmark" aria-label="Preview “Well”">View
                                                </a>|
                                            </span>
                                            <span class="trash">
                                                <a href="<?php echo admin_url( 'admin.php?page=xpd-payment&delete=' ).$result->id ?>"
                                                    onclick="return confirm('Are you sure?')" class="submitdelete"
                                                    aria-label="Delete">Delete</a>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="categories column-categories" data-colname="Categories">
                                        <?php echo $result->Name_of_Item ?></td>
                                    <td class="categories column-categories" data-colname="Categories">
                                        <?php echo ucfirst($result->status) ?></td>
                                    <td class="date column-date" data-colname="Date">
                                        <?php echo date("F j, Y",strtotime($result->timestamp)) ?></td>
                                </tr>
                                <?php
                    }
                }
            ?>



                            </tbody>

                            <tfoot>
                                <tr>

                                    <th scope="col" id="title"
                                        class="manage-column column-title column-primary sortable desc"
                                        style="width: 12%;">
                                        <span>Receivers Full Name</span>
                                    </th>
                                    <th scope="col" id="categories" class="manage-column column-categories">Name of Item
                                    </th>
                                    <th scope="col" id="categories" class="manage-column column-categories">Status
                                    </th>
                                    <th scope="col" id="date" class="manage-column column-date sortable asc">
                                        <span>Date</span>
                                    </th>
                                </tr>
                            </tfoot>

                        </table>



                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<?php
    }

    public static function xpd_admin_page_settings()
    {
        global $wpdb;
        $table = $wpdb->prefix ."xdb_settings";
        $results = $wpdb->get_results("SELECT * FROM $table");
        if(isset($_POST["xpd_update_settings"])){
            unset($_POST["xpd_update_settings"]);
            if(count($results) > 0){
                $query = $wpdb->update(
                        $table, //Table name
                        $_POST, //Data to pass
                        ["id" => 1],
                        $format=NULL
                    );
            }else{
                $query = $wpdb->insert(
                        $table, //Table name
                        $_POST, //Data to pass
                        $format=NULL
                    );
            }
                if ($query == 1) {
                    echo "<div id='message' class='updated notice is-dismissible'><p>Payment Settings Updated. <br><br><a href='".admin_url( 'admin.php?page=xpd-payment-settings')."' class='button button-primary'>Refresh Page</a></p><button type='button' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>";
                }else{
                    echo "<div id='message' class='error notice is-dismissible'><p>".$wpdb->last_error."</p><button type='button' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>";
                }
        }
        ?>
<div class="wrap">
    <h1>XPD Paystack Settings</h1>
    <h2>API Keys Settings</h2>
    <span>Get your API Keys <a href="https://dashboard.paystack.co/#/settings/developer" target="_blank">here</a>
    </span>
    <form method="post" action="">
        <input type="hidden" name="xpd_update_settings" value="update">
        <table class="form-table ">
            <tbody>
                <tr valign="top">
                    <th scope="row">Mode</th>

                    <td>
                        <select class="form-control" name="mode" id="parent_id">
                            <option value="test" <?php echo $results[0]->mode == "test" ? 'selected=""' : "" ?>>Test
                                Mode
                            </option>
                            <option value="live" <?php echo $results[0]->mode == "live" ? 'selected=""' : "" ?>>Live
                                Mode
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Admin Emails</th>
                    <td>
                        <textarea name="emails" rows="5" cols="30" required><?php echo $results[0]->emails ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Test Secret Key</th>
                    <td>
                        <input type="text" name="paystack_secret_key"
                            value="<?php echo $results[0]->paystack_secret_key ?>">
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Test Public Key</th>
                    <td><input type="text" name="paystack_public_key"
                            value="<?php echo $results[0]->paystack_public_key ?>"></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Live Secret Key</th>
                    <td><input type="text" name="paystack_live_secret_key"
                            value="<?php echo $results[0]->paystack_live_secret_key ?>"></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Live Public Key</th>
                    <td><input type="text" name="paystack_live_public_key"
                            value="<?php echo $results[0]->paystack_live_public_key ?>"></td>
                </tr>

            </tbody>
        </table>

        <p class="submit"><input type="submit" class="button button-primary" value="Save Changes"></p>
    </form>
</div>
<?php
    }

    public static function _xpd_admin_menu(){
            add_menu_page(
                'XPD Orders', // $page_title
                'XPD Orders', // $menu_title
                'manage_options', //  $capability
                'xpd-payment', // $menu_slug
                [XPDPAYMENT::class, 'xpd_admin_page'], // $function
                plugin_dir_url( __FILE__ ) . 'assets/img/cropped-Logo-1.png', // Plugin $icon_url
                200 // Plugin $position
            );
            add_submenu_page(
                'xpd-payment',          // parent slug
                'Settings',               // page title
                'Settings',               // menu title
                'manage_options',              // capability
                'xpd-payment-settings',  // slug
                [XPDPAYMENT::class, 'xpd_admin_page_settings'] // callback
            ); 
    }

    public static function dashboard()
    {
        ob_start();
        global $wpdb; //Access WP DB
        $table_name = $wpdb->prefix . 'xdb_orders'; //table name
        $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY timestamp DESC");
        
        ?>
<div>
    <style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    tr:hover {
        background-color: #ddd;
    }

    thead {
        padding-top: 12px;
        padding-bottom: 12px;
        font-weight: 700;
        text-align: left;
        background-color: #2c93f4;
        color: white;
    }
    </style>
    <div style='overflow-x:auto;'>
        <h4>Recent Orders</h4>
        <?php
                if(isset($_GET["view"]) && !empty($_GET["view"])){
                        $table_name_single = $wpdb->prefix . 'xdb_orders'; //table name
                        $id = $_GET["view"];
                        $resultw = $wpdb->get_results("SELECT * FROM $table_name_single where id = '$id'");

                        //Update
                        if(isset($_POST["update_xdp_d"])){
                            $query = $wpdb->update(
                                $table_name_single,
                                ["status" => $_POST["status"]],
                                ["id" => $id],
                                $format=NULL
                            );
                             if ($query == 1) {
                                echo "<div id='message' class='updated notice is-dismissible'><p style='color:green;'>Payment Settings Updated. <br><a href='".$_SERVER['REQUEST_URI']."' class='button button-primary'>Refresh Page to take effect</a></p></div>";
                            }else{
                                echo "<div id='message' class='error notice is-dismissible'><p style='color:red;'>".$wpdb->last_error."</p></div>";
                            }
                        }
                    ?>
        <a href="<?php echo the_permalink(); ?>">
            <button class="button-primary" style="background:black;color:white;">Go Back</button>
        </a>
        <form action="" method="post">
            <input type="hidden" name="update_xdp_d">
            <h5 style="margin-left: 0px;">Current Status: <?php echo ucfirst($resultw[0]->status); ?></h5>
            <div style="display:flex;">
                <div>
                    <select name="status" id="">
                        <option value="booked">Booked</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div>
                    <button class="button-primary" style="background:black;color:white;margin-left:10px;">Update
                        Status</button>
                </div>
            </div>
        </form>
        <hr>
        <div style="overflow-x:auto;">
            <table class="forms" style="width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                <thead style="
    font-size: 20px;
">
                    <tr class="header">
                        <td class="element-header" width="30%">Heading</td>
                        <td class="client" width="20%">Details</td>
                    </tr>
                </thead>
                <tbody style="
    font-size: 15px;
">
                    <tr>
                        <td class="element-style">Address</td>
                        <td><span class="success true"><?php echo $resultw[0]->Address ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Description</td>
                        <td><span class="success true"><?php echo $resultw[0]->Description ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Name of Item</td>
                        <td><span class="success true"><?php echo $resultw[0]->Name_of_Item ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Phone Number</td>
                        <td><span class="success true"><?php echo $resultw[0]->Phone_Number ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Receivers Address</td>
                        <td><span class="success true"><?php echo $resultw[0]->Receivers_Address ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Receivers Email</td>
                        <td><span class="success true"><?php echo $resultw[0]->Receivers_Email ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Receivers Full Name</td>
                        <td><span class="success true"><?php echo $resultw[0]->Receivers_Full_Name ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Receivers Phone Number</td>
                        <td><span class="success true"><?php echo $resultw[0]->Receivers_Phone_Number ?></span></td>
                    </tr>
                    <tr>
                        <td class="element-style">Select One Of XPD Covered Zones in Lagos</td>
                        <td><span
                                class="success true"><?php echo $resultw[0]->Select_One_Of_XPD_Covered_Zones_in_Lagos ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="element-style">Amount</td>
                        <td><span class="success true"><?php echo $resultw[0]->amount ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="element-style">Full Name</td>
                        <td><span class="success true"><?php echo $resultw[0]->fname ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="element-style">Email</td>
                        <td><span class="success true"><?php echo $resultw[0]->pemail ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="element-style">Quantity</td>
                        <td><span class="success true"><?php echo $resultw[0]->quantity ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="element-style">Transaction Reference</td>
                        <td><span class="success true"><?php echo $resultw[0]->xdp_ref ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }else{
        if(isset($_GET["delete"]) && !empty($_GET["delete"])){
                        global $wpdb;
                        $id = $_GET["delete"];
                        $table_name_single = $wpdb->prefix . 'xdb_orders'; 
                        $query = $wpdb->delete($table_name_single, ["id" => $id]);
                        if($query == 1){
                            echo "<script>window.alert('Data Deleted')</script>";
                            echo "<script>window.location.href='".the_permalink()."'</script>";
                        }else{
                            echo "<script>window.alert('".$wpdb->last_error."')</script>";
                            echo "<script>window.location.href='".the_permalink()."'</script>";
                        }
                    }
    ?>
        <table class='forms' style='width: 100%;' width='100%' cellspacing='0' cellpadding='0'>
            <thead>
                <tr class='header'>
                    <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
                        <span>Receivers Full Name</span>
                    </th>
                    <th scope="col" id="categories" class="manage-column column-categories">Name of Item
                    </th>
                    <th scope="col" id="categories" class="manage-column column-categories">Status
                    </th>
                    <th scope="col" id="date" class="manage-column column-date sortable asc">
                        <span>Date</span>
                    </th>
                </tr>
            </thead>
            <tbody id="the-list">
                <?php
                //log
                if(count($results) < 1){
                ?>
                <tr>
                    <th scope="row" class="check-column">
                        <div class="locked-indicator">

                        </div>
                    </th>
                    <td>
                        <h4>No Data to display</h4>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                }else{
                    foreach ($results as $result) {
                        ?>
                <tr id=""
                    class="iedit author-self level-0  type-post status-draft format-standard hentry category-uncategorized">

                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                        <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span>
                        </div>
                        <strong><a class="row-title" href="?view=<?php echo $result->id ?>"
                                aria-label="“Well” (View)"><?php echo $result->Receivers_Full_Name ?></a>
                        </strong>
                        <div class="row-actions">
                            <span class="view">
                                <a href="?view=<?php echo $result->id ?>" rel="bookmark"
                                    aria-label="Preview “Well”">View
                                </a>|
                            </span>
                            <span class="trash">
                                <a href="?delete=<?php echo $result->id ?>" onclick="return confirm('Are you sure?')"
                                    class="submitdelete" aria-label="Delete">Delete</a>
                            </span>
                        </div>
                    </td>
                    <td class="categories column-categories" data-colname="Categories">
                        <?php echo $result->Name_of_Item ?></td>
                    <td class="categories column-categories" data-colname="Categories">
                        <?php echo ucfirst($result->status) ?></td>
                    <td class="date column-date" data-colname="Date">
                        <?php echo date("F j, Y",strtotime($result->timestamp)) ?></td>
                </tr>
                <?php
                    }
                }
            ?>



            </tbody>
        </table>
    </div>
</div>
<?php
    }
    return ob_get_clean();
    }

}

add_action('admin_menu', [XPDPAYMENT::class, '_xpd_admin_menu']);
add_filter('plugin_action_links_'.plugin_basename(__FILE__), [XPDPAYMENT::class, 'xpd_page_link']);
add_shortcode("xpd-payment", [XPDPAYMENT::class, 'shortcode']);
add_shortcode("xpd-dashboard", [XPDPAYMENT::class, 'dashboard']);

add_action( 'wp_ajax_xdp_ajax',[XPDPAYMENT::class, 'xdp_ajax']);
add_action( 'wp_ajax_nopriv_xdp_ajax',[XPDPAYMENT::class, 'xdp_ajax']);

register_activation_hook( __FILE__, [XPDPAYMENT::class, 'create_xdb_db']);

register_deactivation_hook( __FILE__,[XPDPAYMENT::class, 'xdb_db_table']);

require_once "custom-elementor.php";