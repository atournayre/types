<?php

namespace Atournayre\Types\Tests;

use Atournayre\Types\Bic;

class BicTest extends \PHPUnit\Framework\TestCase
{
    public function testBicValidType(): void
    {
        $validBics = [
            'ASPKAT2LXXX',
            'ASPKAT2L',
            'DSBACNBXSHA',
            'UNCRIT2B912',
            'DABADKKK',
            'RZOOAT2L303',
        ];

        foreach ($validBics as $bic) {
            try {
                Bic::fromString($bic);
                $this->assertTrue(true);
            } catch (\InvalidArgumentException $e) {
                throw $e;
            }
        }
    }
    public function testBicInvalidType(): void
    {
        $validBics = [
            'ASPKAT2LXXX',
            'ASPKAT2L',
            'DSBACNBXSHA',
            'UNCRIT2B912',
            'DABADKKK',
            'RZOOAT2L303',
        ];

        foreach ($validBics as $bic) {
            try {
                Bic::fromString($bic);
                $this->assertTrue(true);
            } catch (\InvalidArgumentException $e) {
                throw $e;
            }
        }
    }

    public function testBICInvalidTypes()
    {
        $invalidBics = [
            'DEUTD',
            'ASPKAT2LXX',
            'ASPKAT2LX',
            'ASPKAT2LXXX1',
            'DABADKK',
            '1SBACNBXSHA',
            'RZ00AT2L303',
            'D2BACNBXSHA',
            'DS3ACNBXSHA',
            'DSB4CNBXSHA',
            'DEUT12HH',
            'DSBAC6BXSHA',
            'DSBA5NBXSHA',
            'DSBAAABXSHA',
            'THISSVAL1D]',
            'DEUTDEF]',
            'DeutAT2LXXX',
            'DEUTAT2lxxx',
            'DEUTAT2l xx',
            'DEUTAT2l?xx',
        ];

        foreach ($invalidBics as $bic) {
            $this->expectException(\InvalidArgumentException::class);
            Bic::fromString($bic);
        }
    }
}
