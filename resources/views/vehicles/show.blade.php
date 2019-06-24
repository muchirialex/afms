<html>
  <head>
      <title>A4 Record
      </title>
    <style>
        table {
        border-collapse: collapse;
        margin-left:auto;
        margin-right:auto;
        width: 45%;
        height: auto;
        }
        .center {
            margin-left:auto;
            margin-right:auto;
            width:22%;
            display: block;
        }
        h2 {
        color:#2e86c1;
        }
        h3 {
        text-align:right;
        }
        th {
        color:#2e86c1;
        }
        table.certno {
        color:#2e86c1;
        }
    </style>
  </head>
  <body>
  <br>
    <header>
        <img src="/images/Lable.png"  class="center" alt="LOGO" style="width: 20%;">
        <h2><center>SERVICE RECORDS<center></h2>
        <br>
        <table class="certno">
            <td>
            <h3>SERVICE No.#<strong><i>{{ str_pad($vehicle->id, 6, '0', STR_PAD_LEFT) }}</i></strong></h3>
            </td>
        </table>
    </header>
    <div class="container"></div>
    <div>
        <table>
            <caption></caption>
            <thead>
                <tr>
                <th></th>
                <th></th><td><strong><i></i></strong></td>                              
                </tr>
            </thead>
                <tr rowspan="3">
                    <th colspan="4">CLIENT INFORMATION</th>
                </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>CLIENT NAME:</td><td><strong>{{ $vehicle->client_name }}</strong></td>
            </tr>
                
            <tr>
                <td>POSTAL ADDRESS:</td><td><strong>{{ $vehicle->address }}</strong></td>
            </tr>
                
        </table>
        <br>
        <table>
            <tr rowspan="3">
                <th colspan="4"><p>VEHICLE INFORMATION</p></th>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>MAKE:</td><td><strong>{{ $vehicle->vehicle_make }}</strong></td>
                <td>MODEL:</td> <td><strong>{{ $vehicle->vehicle_model }}</strong></td>
            </tr> 
            <tr>
                <td>REGISTRATION:</td><td><strong>{{ $vehicle->registration_number }}</strong></td>
            </tr>    
            <tr>
                <td>ENGINE No.:</td><td><strong>{{ $vehicle->engine_number }}</strong></td>
                <td>CHASSIS No.:</td><td><strong>{{ $vehicle->chassis_number }}</strong></td>
            </tr>
        </table>
        <br>
        <table>
            <tr rowspan="3">
                <th colspan="4">INSTALLATION INFORMATION</th>
            </tr>
        </table>
        <br>
        <table>
            <tr rowspan="3">
                <td>GADGET TYPE:</td><td><strong>{{ $vehicle->gadget_type }}</strong></td>
                <td>CONDITION:</td><td><strong>{{ $vehicle->condition }}</strong></td>
            </tr>
            <tr>
                <td>SERIAL No.:</td><td><strong>{{ $vehicle->serial }}</strong></td>
            </tr>
            <tr>
                <td>DATE OF ISSUE:</td><td><strong>{{ $vehicle->issue_date }}</strong></td>
                <td>VALIDITY PERIOD:</td><td><strong>{{ $vehicle->validity }}</strong></td>
            </tr>
            <tr>
                <td>EXPIRY DATE:</td><td><strong>{{ $vehicle->expiry_date }}</strong></td>
                <td>INSTALLED BY:</td><td><strong>{{ $vehicle->installer }}</strong></td>
            </tr>                
        </table>
        <br>
        <br>
        <div>
            <table>
                <tr>
                    <th colspan="4"><i><center>I certify that this installation has been examined, tested and verified to meet required standards.</center></i></th>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <br>
            <table>
                <center>
                <tr colspan="4">
                    <td text-align="left">.................................</td>						   
                    <td text-align="right">.................................</td>
                </tr>
                <tr colspan="4">
                    <td text-align="left"><i>Signature & Stamp</i></td>
                    <td text-align="right"><i>Date</i></td>
                </tr>
                </center>
            </table>
            <div style="padding-bottom:3em;"></div>
        </div>
    </div>
  </body>
</html>