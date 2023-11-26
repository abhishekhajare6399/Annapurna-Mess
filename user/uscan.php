<?php include'uheader.php'?>
<style>
.hero-bg {
  background-image: url('<?php echo $bg?>');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
      </style>


<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">

                        <script src="scan\ht.js"></script>
<style>
.result {
    background-color: green;
    color: #fff;
    padding: 20px;
}

.row {
    display: flex;
}
</style>
<div class="row">
    <div class="col-md-7">
        <div style="width: 400px; position: relative; padding: 0px; border: 1px solid silver;" id="reader">
            <div
                style="text-align: left; margin: 0px; padding: 5px; font-size: 20px; border-bottom: 1px solid rgba(192, 192, 192, 0.18);">
                <span><a href="https://github.com/mebjas/html5-qrcode">Code Scanner</a></span><span
                    id="reader__status_span"
                    style="float: right; padding: 5px 7px; font-size: 14px; background: rgb(238, 238, 255); border: 1px solid rgba(0, 0, 0, 0); color: rgb(17, 17, 17);">IDLE</span>
                <div id="reader__header_message"
                    style="display: none; font-size: 14px; padding: 2px 10px; margin-top: 4px; border-top: 1px solid rgb(246, 246, 246);">
                </div>
            </div>
            <div id="reader__scan_region" style="width: 100%; min-height: 100px; text-align: center;"></div>
            <div id="reader__dashboard" style="width: 100%;">
                <div id="reader__dashboard_section" style="width: 100%; padding: 10px; text-align: left;">
                    <div>
                        <div id="reader__dashboard_section_csr" style="display: block;">
                            <div style="text-align: center;"><button>Request Camera Permissions</button></div>
                        </div>
                        <div id="reader__dashboard_section_fsr" style="text-align: center; display: none;"><input
                                id="reader__filescan_input" accept="image/*" type="file" disabled=""
                                style="width: 200px;"><span>&nbsp; Select Image</span></div>
                    </div>
                    <div style="text-align: center;"><a id="reader__dashboard_section_swaplink" href="#scan-using-file"
                            style="text-decoration: underline;">Scan an Image File</a></div>
                </div>
            </div>
        </div>
    </div>
    </div>
  
    
        <form action="">
            <input type="hidden" name="start" class="input" id="result" onkeyup="showHint(this.value)"
                placeholder="result here" readonly="" />
        </form>
   

        <p><span id="txtHint"></span></p>

<script type="text/javascript">
 function changelocation(str) {
        location.replace("uscan_gethint.php?q=" + str);
    }
function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    changelocation(qrCodeMessage);
}

function onScanError(errorMessage) {
    //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: 250
    });
html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>


							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include'ufooter.php'?>
