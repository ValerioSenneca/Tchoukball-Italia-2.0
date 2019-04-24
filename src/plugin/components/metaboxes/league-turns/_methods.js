export default {
    add_turn() {
        this.$root.state.turns.push({
            name: 'Nuovo turno',
            fixtures: []
        })
    },

    switch_turns(event, index) {
        if (this.current_dragged_turn) {
            const IS_DRAGGABLE_MOVING_DOWN = index > this.current_dragged_turn.index
            
            event.preventDefault()

            this.$root.state.turns.splice(index + IS_DRAGGABLE_MOVING_DOWN, 0, this.current_dragged_turn.turn)
            this.$root.state.turns.splice(this.current_dragged_turn.index + !IS_DRAGGABLE_MOVING_DOWN, 1)
            this.current_dragged_turn.index = index
        }
    },

    switch_fixtures(event, turn_index, fixture_index) {
        if (this.current_dragged_fixture) {
            const
                IS_MOVING_TO_ANOTHER_TURN = turn_index !== this.current_dragged_fixture.turn_index,
                IS_DRAGGABLE_MOVING_DOWN = fixture_index > this.current_dragged_fixture.fixture_index

            event.preventDefault()

            this.$root.state.turns[turn_index].fixtures.splice(fixture_index + (!IS_MOVING_TO_ANOTHER_TURN && IS_DRAGGABLE_MOVING_DOWN), 0, this.current_dragged_fixture.fixture)
            this.$root.state.turns[this.current_dragged_fixture.turn_index].fixtures.splice(this.current_dragged_fixture.fixture_index + (IS_MOVING_TO_ANOTHER_TURN ? 0 : !IS_DRAGGABLE_MOVING_DOWN), 1)
            this.current_dragged_fixture.fixture_index = fixture_index
            this.current_dragged_fixture.turn_index = turn_index
        }
    },
    
    set_current_dragged_turn(index, turn) {
        this.current_dragged_turn = { index, turn }
    },

    reset_current_dragged_turn() {
        this.current_dragged_turn = null
    },

    set_current_dragged_fixture(turn_index, fixture_index, fixture) {
        this.current_dragged_fixture = { turn_index, fixture_index, fixture }
    },

    reset_current_dragged_fixture() {
        this.current_dragged_fixture = null
    },

    is_turn_dragged(index) {
        return this.current_dragged_turn && this.current_dragged_turn.index === index
    },

    toggle_open_status(index) {
        this.$root.state.turns[index].is_open = !this.$root.state.turns[index].is_open
    }
}