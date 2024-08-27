<?php
$subdomain = "89265444561";
$accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZiNGNmOTA0ZGEwNjZkY2NjYTMxZjc1NDliNDg4ZWE5ZDJhYTZkMjgwN2YwN2Q4ZDY0Y2M1ZWJmNzEzYTIzYzY2ZGJiMGIyOWU5NmE3YzI1In0.eyJhdWQiOiJjYmI0ZWY5NC1hMzBmLTQyMTgtYjc5Mi0xYzYwMmM5OTA3OWQiLCJqdGkiOiI2YjRjZjkwNGRhMDY2ZGNjY2EzMWY3NTQ5YjQ4OGVhOWQyYWE2ZDI4MDdmMDdkOGQ2NGNjNWViZjcxM2EyM2M2NmRiYjBiMjllOTZhN2MyNSIsImlhdCI6MTcyNDc1MTM2MCwibmJmIjoxNzI0NzUxMzYwLCJleHAiOjE3MjQ4Mzc3NjAsInN1YiI6IjExNDIzODg2IiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMxOTA5NDkwLCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJwdXNoX25vdGlmaWNhdGlvbnMiLCJmaWxlcyIsImNybSIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiNTIxMmQ5NjMtZjVjYy00ODYyLWE3NTMtMzZhODI1ZGNmNTUwIiwiYXBpX2RvbWFpbiI6ImFwaS1iLmFtb2NybS5ydSJ9.KvfPZwQlw0jDsA9xS42JUo4GVoX04MLno7C5X2TChyXMU6_taH8RSFjfXN2pt953fH7H1pEioTJC2-cMxtfGO5vlQ7mTPhc_98R1ObGmQl980xEOhgZ90zPd9DHb3qQi0Noa4oO4UOEEF2VkiVkWMZv2CImVli9meaY9JyOZRydDJPG1Q_iCI209udrd4nLioKcUY9NQVATckARM5xOqV7m5QX6_teyCW4iKfGvNlrzDZAwfFTv2cKBAXjZTgtUvt4uPdSIw4lwcite2-uFJ4gyCqt8Y99zbGuskBAmjoekrAyBJ1kRBd949ZgfZ4cy4xbVtRae0Hh269QU6vh7TBw';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$price = intval($_POST['price']);
$visiting_time = intval($_POST['visiting-time']);

$leadData = [
    [
        "name" => $name,
        "created_by" => 0,
        "price" => $price,
        "custom_fields_values" => [
            [
                "field_id" => 645309,
                "values" => [
                    [
                        "value" => $name
                    ]
                ]
            ],
            [
                "field_id" => 645311,
                "values" => [
                    [
                        "value" => $email
                    ]
                ]
            ],
            [
                "field_id" => 645313,
                "values" => [
                    [
                        "value" => $phone
                    ]
                ]
            ],
            [
                "field_id" => 647763,
                "values" => [
                    [
                        "value" => $visiting_time
                    ]
                ]
            ]
        ]
    ]
];

$method = "/api/v4/leads/complex";

$leadDataJson = json_encode($leadData);

$url = "https://$subdomain.amocrm.ru/api/v4/leads";

$headers = [
    "Authorization: Bearer $accessToken",
    "Content-Type: application/json"
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $leadDataJson);

$response = curl_exec($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($httpcode === 200 || $httpcode === 201) {
    echo "Форма успешно отправлена!";
    header("Location: /?send=ok");
} else {
    echo "Ошибка отправки формы: " . $response;
}
?>