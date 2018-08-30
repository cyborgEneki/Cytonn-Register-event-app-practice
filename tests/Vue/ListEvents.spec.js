import { shallow, mount } from '@vue/test-utils';
import expect from 'expect';
import Layout from '../../resources/assets/js/components/Layout';

describe('Layout', () => {

    const wrapper = mount(Layout)
s
    it('has at least one div', () => {
        expect(wrapper.contains('div')).toBe(true)
    })
})