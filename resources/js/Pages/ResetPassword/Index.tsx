import { useTranslationsStore } from "@narsil-localization/Stores/translationStore";
import BackButton from "@narsil-ui/Components/Button/BackButton";
import Button from "@narsil-ui/Components/Button/Button";
import Form from "@narsil-forms/Components/Form/Form";
import FormProvider from "@narsil-forms/Components/Form/FormProvider";
import FormRenderer from "@narsil-forms/Components/Form/FormRenderer";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionFullscreenToggle from "@narsil-ui/Components/Section/SectionFullscreenToggle";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";
import useForm from "@narsil-forms/Components/Form/useForm";

interface Props {
	form: FormModel;
	token: string;
}

const Index = ({ form, token }: Props) => {
	const { trans } = useTranslationsStore();

	const reactForm = useForm({
		form: form,
		data: {
			token: token,
		},
	});

	return (
		<FormProvider {...reactForm}>
			<Form route={route("password.update")}>
				<Section>
					<SectionHeader>
						<SectionTitle>{form.title}</SectionTitle>
						<SectionFullscreenToggle />
					</SectionHeader>
					<SectionContent>
						<FormRenderer nodes={form.nodes} />
					</SectionContent>
					<SectionFooter>
						<Button type='submit'>{trans("Confirm")}</Button>
						<BackButton href={route("login")} />
					</SectionFooter>
				</Section>
			</Form>
		</FormProvider>
	);
};

export default Index;
