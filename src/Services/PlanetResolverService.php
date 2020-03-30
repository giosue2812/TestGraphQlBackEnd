<?php


use App\Entity\Planet;
use App\Repository\PlanetRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class PlanetResolverService implements ResolverInterface, AliasedInterface
{
    /**
     * @var PlanetRepository $planetRepository
     */
    private $planetRepository;

    /**
     * PlanetResolverService constructor.
     * @param PlanetRepository $planetRepository
     */
    public function __construct(PlanetRepository $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }

    /**
     * @param int $id
     * @return Planet
     */
    public function resolve(int $id)
    {
        return $this->planetRepository->find($id);
    }
    /**
     * @inheritDoc
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'Planet',
        ];
    }
}
