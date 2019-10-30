# Omnipay: Payson

**Payson.se Gateway for the Omnipay PHP payment processing library.**

### See [Payson Rest Api V2](https://tech.payson.se/paysoncheckout2/rest-api/) for details
### See [Payson Api V1](https://tech.payson.se/paysoncheckout1/) for details

## Usage (Api V2):
```
// create payson transaction:

$gateway = Omnipay::create('Payson_ApiV2');
$gateway->initialize([
    'apiKey' => '2acab30d-fe50-426f-90d7-8c60a7eb31d4',
    'agentId' => '4',
    'testMode' => true,
]);

$response = $gateway->purchase([
     'returnUrl' => 'http://hostname/return',
     'notifyUrl' => 'http://hostname/notify',
     'termsUrl' => 'http://hostname/terms',
     'currency' => 'sek',
     'items' => [
         [
             'name' => 'Item name',
             'unitPrice' => 10.01
             'quantity' => 1,
             'reference' => 'order or transaction Id in your system'
             'type' => 'service'
         ]
     ]
 ])->send();
 
if ($response->isRedirect()) {
    $transactionReference = $response->getTransactionReference(); 
    $responseData = $response->getData();
    $response->redirect();
}

// check transaction status and update payment status in your system

$response = $gateway->completePurchase([
    'transactionReference' => $transaction->reference
])->send();

if ($response->isSuccessful()) {
    $restponseDetails = $response->getData();
}
```
## Usage (Api V1):
```
$gateway = Omnipay::create('Payson_ApiV1');
$gateway->initialize([
    'apiKey' => '2acab30d-fe50-426f-90d7-8c60a7eb31d4',
    'agentId' => '4',
    'testMode' => true,
    'receiverEmail' => 'testagent-checkout2@payson.se'
]);

$response = $gateway->purchase([
    'returnUrl' => 'http://hostaname/return',
    'notifyUrl' => 'http://hostname/notify',
    'cancelUrl' => 'http://hostname/cancel',
    'currency' => 'sek',
    'memo' => 'transaction or order id or something else',
    'amount' => 10.01
])->send();
```
