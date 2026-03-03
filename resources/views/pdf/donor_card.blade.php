<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; }
        .card {
            border:1px solid #ccc;
            padding:20px;
            border-radius:8px;
        }
        .title { color:#dc3545; font-size:20px; font-weight:bold; }
    </style>
</head>
<body>

<div class="card">
    <div class="title">Blood Donation Portal</div>

    <p><strong>Donor No:</strong>
        #DONOR{{ str_pad($donor->donor_id, 4, '0', STR_PAD_LEFT) }}
    </p>

    <p><strong>Name:</strong> {{ $donor->name }}</p>
    <p><strong>Email:</strong> {{ $donor->email }}</p>
    <p><strong>Age:</strong> {{ $donor->age }}</p>
    <p><strong>Blood Group:</strong> {{ $donor->blood_group }}</p>

    <p style="margin-top:20px;">Verified Donor</p>
</div>

</body>
</html>
