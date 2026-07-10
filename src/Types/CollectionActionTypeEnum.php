<?php

namespace Voltaria\Types;

enum CollectionActionTypeEnum: string
{
    case Email = "email";
    case Sms = "sms";
    case PhoneCall = "phone_call";
    case PushNotification = "push_notification";
}
