<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pilotos Model
 *
 * @method \App\Model\Entity\Piloto newEmptyEntity()
 * @method \App\Model\Entity\Piloto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Piloto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Piloto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Piloto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Piloto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Piloto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Piloto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Piloto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Piloto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Piloto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Piloto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Piloto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PilotosTable extends Table
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

        $this->setTable('pilotos');
        $this->setDisplayField('id_piloto');
        $this->setPrimaryKey('id_piloto');
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
            ->integer('id_piloto')
            ->allowEmptyString('id_piloto', null, 'create');

        $validator
            ->scalar('ci')
            ->maxLength('ci', 20)
            ->requirePresence('ci', 'create')
            ->notEmptyString('ci')
            ->add('ci', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('apellido')
            ->maxLength('apellido', 100)
            ->requirePresence('apellido', 'create')
            ->notEmptyString('apellido');

        $validator
            ->scalar('correo')
            ->maxLength('correo', 50)
            ->requirePresence('correo', 'create')
            ->notEmptyString('correo');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 50)
            ->requirePresence('telefono', 'create')
            ->notEmptyString('telefono');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['ci']), ['errorField' => 'ci']);

        return $rules;
    }
}
