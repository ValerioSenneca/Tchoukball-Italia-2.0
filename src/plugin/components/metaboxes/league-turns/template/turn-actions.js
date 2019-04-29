export default /* html */ `
    <button
        :class="bem('list__item__delete')"
    ></button>
    
    <button
        :class="bem('list__item__add')"
        @click.prevent="add_fixture(turn_index)"
    ></button>
    
    <button
        :class="bem('list__item__open')"
        :disabled="!turn.fixtures.length"
        @click.prevent="toggle_open_status(turn_index)"
    ></button>
`