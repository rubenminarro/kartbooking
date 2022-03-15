<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Karts Model
 *
 * @method \App\Model\Entity\Kart newEmptyEntity()
 * @method \App\Model\Entity\Kart newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Kart[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kart get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kart findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Kart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kart[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kart|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kart[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Kart[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Kart[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Kart[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class KartsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('karts');
        $this->setDisplayField('id_kart');
        $this->setPrimaryKey('id_kart');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_kart')
            ->allowEmptyString('id_kart', null, 'create');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 100)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        return $validator;
    }
}
