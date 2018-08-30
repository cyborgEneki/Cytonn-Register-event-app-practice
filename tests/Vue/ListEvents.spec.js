import { shallow,shallowMount, mount } from '@vue/test-utils';
import expect from 'expect';
import Activity from '../../resources/assets/js/components/activity_user';

describe('Activity', () => {

    const wrapper = mount(Activity,{
        stubs:['el-checkbox'],
        propsData:{"ischecked":1, "id":1, 'eventid':3}

    })

    it('has at least one div', () => {
        expect(wrapper.contains('div')).toBe(true)
    })

    it('has at required props', () => {
        expect(wrapper.props().ischecked).toBe(1)
        expect(wrapper.props().id).toBe(1)
        expect(wrapper.props().eventid).toBe(3)
    })



})