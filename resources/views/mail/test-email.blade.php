<!DOCTYPE html>
<html>

<head>
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet">
    <title></title>
</head>

<body>
    <div>
        <div class="container-fluid">
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <p>Dear {{ $name }},</p>
                <p>Please be informed that you are invited to {{ $eventname }} .</p>
                <p>2. For your information the review will be held as per the details below:</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Date: {{ $dateStart }}</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Time: {{ $timeStart }}</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;Veneu: {{ $veneu }}</p>
                <p>3. Click the button below to confirm or reject your rsvp do not hesitate to reach out for any further
                    information or clarification needed prior to the event.</p><a href={{ route($eventrsvp) }}
                    class="btn bg-gradient-primary btn-sm mb-0" type="button">&nbsp; RSVP</a>
                <p>Best regards, MyEvent</p>
            </div>
        </div>
    </div>
</body>

</html>
