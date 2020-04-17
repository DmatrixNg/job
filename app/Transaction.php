<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
      "orderRef",
    "flwRef",
    "redirectUrl",
    "device_fingerprint",
    "settlement_token",
    "cycle",
    "amount",
    "charged_amount",
    "appfee",
    "merchantfee",
    "merchantbearsfee",
    "chargeResponseCode",
    "raveRef",
    "chargeResponseMessage",
    "authModelUsed",
    "currency",
    "IP",
    "narration",
    "status",
    "modalauditid",
    "vbvrespmessage",
    "authurl",
    "vbvrespcode",
    "acctvalrespmsg",
    "acctvalrespcode",
    "paymentType",
    "paymentPlan",
    "paymentPage",
    "paymentId",
    "fraud_status",
    "charge_type",
    "is_live",
    "retry_attempt",
    "getpaidBatchId",
    "createdAt",
    "updatedAt",
    "deletedAt",
    "customerId",
    "AccountId",
];

}
