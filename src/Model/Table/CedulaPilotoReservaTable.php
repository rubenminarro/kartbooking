<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CedulaPilotoReserva Model
 *
 * @method \App\Model\Entity\CedulaPilotoReserva newEmptyEntity()
 * @method \App\Model\Entity\CedulaPilotoReserva newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva get($primaryKey, $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CedulaPilotoReserva[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CedulaPilotoReservaTable extends Table
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

        $this->setTable('cedula_piloto_reserva');
        $this->setDisplayField('id_cedula_piloto_reserva');
        $this->setPrimaryKey('id_cedula_piloto_reserva');
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
            ->integer('id_cedula_piloto_reserva')
            ->allowEmptyString('id_cedula_piloto_reserva', null, 'create');

        $validator
            ->integer('id_reserva')
            ->requirePresence('id_reserva', 'create')
            ->notEmptyString('id_reserva');

        $validator
            ->scalar('ci')
            ->maxLength('ci', 20)
            ->allowEmptyString('ci');

        return $validator;
    }
}
