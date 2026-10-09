<?php

namespace Voltaria\Types;

enum LoanRepaymentMethodEnum: string
{
    case Pmt = "pmt";
    case ConstantPrincipal = "constant_principal";
}
