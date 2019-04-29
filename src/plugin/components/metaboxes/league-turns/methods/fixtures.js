export default {
    add_fixture(index) {
        this.$root.state.turns[index].fixtures.push({
            teams: {
                home: {
                    id: 1,
                    score: 20
                },
                away: {
                    id: 2,
                    score: 30
                }
            },
            place: "Bologna",
            date: "21321312"
        })
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

    set_current_dragged_fixture(turn_index, fixture_index, fixture) {
        this.current_dragged_fixture = { turn_index, fixture_index, fixture }
    },

    reset_current_dragged_fixture() {
        this.current_dragged_fixture = null
    }
}