import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import Button from "@narsil-ui/Components/Button/Button";
import Form from "@narsil-forms/Components/Form/Form";
import FormProvider from "@narsil-forms/Components/Form/FormProvider";
import FormRenderer from "@narsil-forms/Components/Form/FormRenderer";
import Fullscreen from "@narsil-ui/Components/Fullscreen/Fullscreen";
import FullscreenToggle from "@narsil-ui/Components/Fullscreen/FullscreenToggle";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import useForm from "@narsil-forms/Components/Form/useForm";

interface Props {
	form: FormModel;
}

const Index = ({ form }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("password.confirm")}>
				<Fullscreen>
					<Section>
						<SectionHeader>
							<SectionTitle>{form.title}</SectionTitle>
							<FullscreenToggle />
						</SectionHeader>
						<SectionContent>
							<FormRenderer nodes={form.nodes} />
						</SectionContent>
						<SectionFooter>
							<Button type='submit'>{trans("Confirm")}</Button>
						</SectionFooter>
					</Section>
				</Fullscreen>
			</Form>
		</FormProvider>
	);
};

export default Index;
