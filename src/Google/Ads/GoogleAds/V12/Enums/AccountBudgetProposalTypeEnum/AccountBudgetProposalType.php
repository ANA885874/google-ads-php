<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/enums/account_budget_proposal_type.proto

namespace Google\Ads\GoogleAds\V12\Enums\AccountBudgetProposalTypeEnum;

use UnexpectedValueException;

/**
 * The possible types of an AccountBudgetProposal.
 *
 * Protobuf type <code>google.ads.googleads.v12.enums.AccountBudgetProposalTypeEnum.AccountBudgetProposalType</code>
 */
class AccountBudgetProposalType
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Identifies a request to create a new budget.
     *
     * Generated from protobuf enum <code>CREATE = 2;</code>
     */
    const CREATE = 2;
    /**
     * Identifies a request to edit an existing budget.
     *
     * Generated from protobuf enum <code>UPDATE = 3;</code>
     */
    const UPDATE = 3;
    /**
     * Identifies a request to end a budget that has already started.
     *
     * Generated from protobuf enum <code>END = 4;</code>
     */
    const END = 4;
    /**
     * Identifies a request to remove a budget that hasn't started yet.
     *
     * Generated from protobuf enum <code>REMOVE = 5;</code>
     */
    const REMOVE = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::CREATE => 'CREATE',
        self::UPDATE => 'UPDATE',
        self::END => 'END',
        self::REMOVE => 'REMOVE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountBudgetProposalType::class, \Google\Ads\GoogleAds\V12\Enums\AccountBudgetProposalTypeEnum_AccountBudgetProposalType::class);
