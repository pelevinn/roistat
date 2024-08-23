<?php
$subdomain = "89265444561";
$accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQzN2MyYTM3YmE5Yzc2NWMwMzk5MzcwMzQwOTU0Nzg4YzNlNjY5Y2VjNmJiNGUwZDVlZmU3YzQyMzRiN2EzOTI2YzE3ZjNmNjk0ODQwOTNkIn0.eyJhdWQiOiJjYmI0ZWY5NC1hMzBmLTQyMTgtYjc5Mi0xYzYwMmM5OTA3OWQiLCJqdGkiOiI0MzdjMmEzN2JhOWM3NjVjMDM5OTM3MDM0MDk1NDc4OGMzZTY2OWNlYzZiYjRlMGQ1ZWZlN2M0MjM0YjdhMzkyNmMxN2YzZjY5NDg0MDkzZCIsImlhdCI6MTcyNDM2NzM4NywibmJmIjoxNzI0MzY3Mzg3LCJleHAiOjE3MjQ0NTM3ODcsInN1YiI6IjExNDIzODg2IiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMxOTA5NDkwLCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJwdXNoX25vdGlmaWNhdGlvbnMiLCJmaWxlcyIsImNybSIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiZmZkYWYxZTItZjYyYS00MzQ3LWE3MzktYjdlMTM1N2Y5NmU0IiwiYXBpX2RvbWFpbiI6ImFwaS1iLmFtb2NybS5ydSJ9.Z2g1VUHZnAS7yoBKuFyjOLqee-zhLbjmR17bh2KWKaxzyzoPPncKETyegxYWlXHpD1hPM7N6Jlt-RawMs3hYgiHhLW272eVRC2de6KjWrzW-Uy-EVMPkkQl36e0qj9ghJZp1mjAbzK1Xrk7A5h0EYKYu0eP3VJqQS3wSYxj752gtCtE0RkTtbWhpZhqtHw-swzOEMZNBmQuEQIM_We6JmnfDqkWMxVX1RF0EtiOfeY8kJi0qXkkX_b7amO-uT-jqM_LnZoAYpwa2BZqLmTpiXwFzDZQtzFDWpiPyjQ990hUdoO5kIJ6g1harLmuKdhpkYQ7v0TEFNn6x_m-9-SXyNQ';

$leadData = [
    [
            "contacts" => [
                [
                    "name" => $name,
                    "custom_fields_values" => [
                        [
                            "field_code" => "email",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $email
                                ]
                            ]
                        ],
                        [
                            "field_code" => "phone",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $phone
                                ]
                            ]
                        ]
                    ]
                ]
            ]

        ]      
];

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
    echo "Лид успешно создан!";
    header("Location: /?send=ok");
} else {
    echo "Ошибка при создании лида: " . $response;
}
?>