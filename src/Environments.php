<?php

namespace Voltaria;

enum Environments: string
{
    case Sandbox = "https://api.sandbox.voltaria.io";
    case Production = "https://api.voltaria.io";
}
