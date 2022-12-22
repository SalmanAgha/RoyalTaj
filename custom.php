<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SWClass javascript print</title>
    <style>
        .print {
            display:none;
        }
        .no-print{
            display:block;
        }

        @media print{
            .print {
                display:block;
            }
            .no-print{
                display:none;
            }
        }
    </style>
    <script>
        var jsPrintAll = function () {
            setTimeout(function () {
                window.print();
            }, 500);
        }
    </script>
</head>
<body>
<div class="no-print" style="width:100%;">
 <input type="button" id="btnPrint" onclick="jsPrintAll()" value="Print" />
 </div>
 <div class="no-print" style="width:100%;">
 To print invoice click on print button.
 </div>

 <div class="print" style="background-color:white;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
 <table style="max-width:600px;margin:100px auto 5px;background-color:white;padding:10px; border-top: solid 10px red;">
 <thead>
 <tr>
                <th><p>Welcome to Royal Taj</p>
                <p>Store ID: 0162</p>
                <p>NIN/SNIN        0819531-5</p></th>
                                </tr>
                <tr>
                    <th><p><img style="max-width: 150px;" src="assets/hoteltaj.png" alt="swclass tours">
                   <p> Order Number 0000</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="height:35px;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                        <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Taj Invoice No.</span><b style="color:black;font-weight:normal;margin:0">0000</b></p>
                        <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Date</span> 12/6/2022 02:12 PM</p>
                        <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Cashier</span>Shehroz</p>
                    </td>
                </tr>
                <tr>
                    <td style="height:35px;"></td>
                </tr>
                <tr>
                    <td style="width:50%;padding:20px;vertical-align:top">
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> Palash Basak</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> palash@gmail.com</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> +91-1234567890</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">ID No.</span> 2556-1259-9842</p>
                    </td>
                    <td style="width:50%;padding:20px;vertical-align:top">
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span> Khudiram Pally, Malbazar, West Bengal, India, 735221</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Number of gusets</span> 2</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Duration of your vacation</span> 25/04/2017 to 28/04/2017 (3 Days)</p>
                    </td>
                </tr>
                <tr>
                    <td style="height:35px;"></td>
                </tr>

                    <td style="width:70%;padding:20px;vertical-align:top">
<table class="table">
                  <thead  class="text-white">
                    <tr>
                      
                      <th scope="col">Product Name</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Unit Price</th>
                      <th scope="col">Total Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                      <td>Family Festival-3</td>
                      <td>1</td>
                      <td>2090</td>
                      <td>2090</td>
                    </tr>
                    <tr>
                      
                      <td>Mighty</td>
                      <td>1</td>
                      <td>699</td>
                      <td>699</td>
                    </tr>
                    <tr>
                      
                      <td>Duo Box</td>
                      <td>1</td>
                      <td>1270</td>
                      <td>1270</td>
                    </tr>
                  </tbody>

                </table></td>
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                        <strong style="display:block;margin:0 0 10px 0;">Regards</strong> swclass Tours<br> Sec 34 A, SCO-152-155 Pin/Zip - 126034, Chandigarh, India<br><br>
                        <b>Phone:</b> 878787878787<br>
                        <b>Email:</b> contact@swclass.com
                    </td>
                </tr>
            </tfooter>
        </table>
    </div>
</body>
</html>
